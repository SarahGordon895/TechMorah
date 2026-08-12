<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ChatApiController extends Controller
{
    /**
     * Store user message.
     */
    public function sendMessage(Request $request)
    {
        $payload = $request->validate([
            'session_id' => 'nullable|string',
            'body' => 'required|string',
        ]);

        $session = $payload['session_id'] ?? session()->getId();

        $chat = Chat::firstOrCreate(['session_id' => $session]);

        $message = $chat->messages()->create([
            'sender_type' => 'user',
            'body' => $payload['body'],
        ]);

        return response()->json(['status' => 'ok', 'message' => $message]);
    }

    /**
     * Send user message to OpenAI and return AI response.
     */
    public function aiReply(Request $request)
    {
        $data = $request->validate([
            'session_id' => 'nullable|string',
            'body' => 'required|string',
        ]);

        $session = $data['session_id'] ?? session()->getId();
        $chat = Chat::firstOrCreate(['session_id' => $session]);
        $chat->loadMissing('messages');

        // Save user message so it appears in history
        $chat->messages()->create([
            'sender_type' => 'user',
            'body' => $data['body'],
        ]);

        // refresh the relationship so conversationHistory sees the latest entry
        $chat->unsetRelation('messages');
        $chat->load('messages');

        $provider = strtolower((string) env('AI_PROVIDER', 'openai'));

        if ($provider === 'huggingface') {
            return $this->respondViaHuggingFace($chat, $session, $data['body']);
        }

        if ($provider === 'mistral') {
            return $this->respondViaMistral($chat, $session, $data['body']);
        }

        if ($provider === 'ollama') {
            return $this->respondViaOllama($chat, $session, $data['body']);
        }

        if ($provider === 'groq') {
            return $this->respondViaGroq($chat, $session, $data['body']);
        }

        if ($provider === 'gemini') {
            return $this->respondViaGemini($chat, $session, $data['body']);
        }

        return $this->respondViaOpenAi($chat, $session, $data['body']);
    }

    protected function respondViaHuggingFace(Chat $chat, string $session, string $prompt)
    {
        $apiKey = env('HUGGINGFACE_API_KEY');
        $model = env('AI_MODEL', 'HuggingFaceH4/zephyr-7b-beta');

        if (empty($apiKey)) {
            return $this->respondWithFallback($chat, $session, $prompt, 'Missing Hugging Face API key');
        }

        $messages = $this->conversationHistory($chat);
        array_unshift($messages, [
            'role' => 'system',
            'content' => $this->techMorahSystemPrompt(),
        ]);

        $payload = [
            'inputs' => $messages,
            'parameters' => [
                'max_new_tokens' => 400,
                'temperature' => 0.7,
                'return_full_text' => false,
            ],
            'options' => [
                'wait_for_model' => true,
            ],
        ];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $apiKey,
                'Accept' => 'application/json',
            ])->timeout(30)->post("https://api-inference.huggingface.co/models/{$model}", $payload);
        } catch (\Throwable $th) {
            Log::error('Hugging Face request failed', ['exception' => $th]);
            return $this->respondWithFallback($chat, $session, $prompt, 'Hugging Face API request exception');
        }

        if ($response->failed()) {
            Log::warning('Hugging Face responded with error', ['body' => $response->json()]);
            return $this->respondWithFallback($chat, $session, $prompt, 'Hugging Face API response error');
        }

        $body = $response->json();
        $botText = $this->extractHuggingFaceText($body);

        if (!$botText) {
            return $this->respondWithFallback($chat, $session, $prompt, 'Empty Hugging Face reply');
        }

        return $this->respondWithBot($chat, $session, $botText);
    }

    protected function respondViaGemini(Chat $chat, string $session, string $prompt)
    {
        $apiKey = env('GEMINI_API_KEY');
        $model = env('GEMINI_MODEL', 'gemini-1.5-flash');

        if (empty($apiKey)) {
            return $this->respondWithFallback($chat, $session, $prompt, 'Missing Gemini API key');
        }

        $history = $this->conversationHistory($chat);

        $contents = array_map(function ($message) {
            return [
                'role' => $message['role'] === 'assistant' ? 'model' : 'user',
                'parts' => [
                    ['text' => $message['content']],
                ],
            ];
        }, $history);

        // Ensure the current user prompt is part of the payload (history could be trimmed)
        $lastEntry = $contents[count($contents) - 1] ?? null;
        $lastText = $lastEntry['parts'][0]['text'] ?? null;

        if (!$lastEntry || ($lastEntry['role'] ?? null) !== 'user' || $lastText !== $prompt) {
            $contents[] = [
                'role' => 'user',
                'parts' => [
                    ['text' => $prompt],
                ],
            ];
        }

        $payload = [
            'system_instruction' => [
                'parts' => [
                    ['text' => $this->techMorahSystemPrompt()],
                ],
            ],
            'contents' => $contents,
            'generationConfig' => [
                'maxOutputTokens' => 600,
                'temperature' => 0.7,
            ],
        ];

        $endpoint = sprintf('https://generativelanguage.googleapis.com/v1beta/models/%s:generateContent?key=%s', $model, $apiKey);

        try {
            $response = Http::timeout(20)->post($endpoint, $payload);
        } catch (\Throwable $th) {
            Log::error('Gemini request failed', ['exception' => $th]);
            return $this->respondWithFallback($chat, $session, $prompt, 'Gemini API request exception');
        }

        if ($response->failed()) {
            Log::warning('Gemini responded with error', [
                'status' => $response->status(),
                'body' => $response->json(),
            ]);
            return $this->respondWithFallback($chat, $session, $prompt, 'Gemini API response error');
        }

        $body = $response->json();
        $botText = null;

        if (!empty($body['candidates'][0]['content']['parts'])) {
            foreach ($body['candidates'][0]['content']['parts'] as $part) {
                if (!empty($part['text'])) {
                    $botText = trim($part['text']);
                    break;
                }
            }
        }

        if (!$botText) {
            Log::warning('Gemini returned empty content', ['body' => $body]);
            return $this->respondWithFallback($chat, $session, $prompt, 'Empty Gemini reply');
        }

        return $this->respondWithBot($chat, $session, trim($botText));
    }

    protected function respondViaGroq(Chat $chat, string $session, string $prompt)
    {
        $apiKey = env('GROQ_API_KEY');
        $model = env('AI_MODEL', 'llama3-8b-8192');

        if (empty($apiKey)) {
            return $this->respondWithFallback($chat, $session, $prompt, 'Missing Groq API key');
        }

        $messages = $this->conversationHistory($chat);
        array_unshift($messages, [
            'role' => 'system',
            'content' => $this->techMorahSystemPrompt(),
        ]);

        $payload = [
            'model' => $model,
            'messages' => $messages,
            'max_tokens' => 600,
            'temperature' => 0.7,
        ];

        try {
            $response = Http::withToken($apiKey)
                ->timeout(20)
                ->post('https://api.groq.com/openai/v1/chat/completions', $payload);
        } catch (\Throwable $th) {
            Log::error('Groq request failed', ['exception' => $th]);
            return $this->respondWithFallback($chat, $session, $prompt, 'Groq API request exception');
        }

        if ($response->failed()) {
            Log::warning('Groq responded with error', ['body' => $response->json()]);
            return $this->respondWithFallback($chat, $session, $prompt, 'Groq API response error');
        }

        $body = $response->json();
        $botText = $body['choices'][0]['message']['content'] ?? null;

        if (!$botText) {
            return $this->respondWithFallback($chat, $session, $prompt, 'Empty Groq reply');
        }

        return $this->respondWithBot($chat, $session, $botText);
    }

    protected function respondViaOllama(Chat $chat, string $session, string $prompt)
    {
        $host = rtrim(env('OLLAMA_HOST', 'http://127.0.0.1:11434'), '/');
        $model = env('AI_MODEL', 'llama3');
        $endpoint = $host . '/api/chat';

        $messages = $this->conversationHistory($chat);
        array_unshift($messages, [
            'role' => 'system',
            'content' => $this->techMorahSystemPrompt(),
        ]);

        $payload = [
            'model' => $model,
            'messages' => $messages,
            'stream' => false,
        ];

        try {
            $response = Http::timeout(30)->post($endpoint, $payload);
        } catch (\Throwable $th) {
            Log::error('Ollama request failed', ['exception' => $th]);
            return $this->respondWithFallback($chat, $session, $prompt, 'Ollama request exception');
        }

        if ($response->failed()) {
            Log::warning('Ollama responded with error', ['body' => $response->json()]);
            return $this->respondWithFallback($chat, $session, $prompt, 'Ollama response error');
        }

        $body = $response->json();
        $botText = $body['message']['content'] ?? ($body['response'] ?? null);

        if (!$botText) {
            return $this->respondWithFallback($chat, $session, $prompt, 'Empty Ollama reply');
        }

        return $this->respondWithBot($chat, $session, trim($botText));
    }

    protected function respondViaOpenAi(Chat $chat, string $session, string $prompt)
    {
        $apiKey = env('OPENAI_API_KEY');
        $model = env('AI_MODEL', 'gpt-4o-mini');

        if (empty($apiKey)) {
            return $this->respondWithFallback($chat, $session, $prompt, 'Missing OpenAI API key');
        }

        $messages = $this->conversationHistory($chat);
        array_unshift($messages, [
            'role' => 'system',
            'content' => $this->techMorahSystemPrompt(),
        ]);

        $payload = [
            'model' => $model,
            'messages' => $messages,
            'max_tokens' => 600,
            'temperature' => 0.7,
        ];

        try {
            $response = Http::withToken($apiKey)
                ->timeout(60)
                ->post('https://api.openai.com/v1/chat/completions', $payload);
        } catch (\Throwable $th) {
            Log::error('OpenAI request failed', ['exception' => $th]);
            return $this->respondWithFallback($chat, $session, $prompt, 'API request exception');
        }

        if ($response->failed()) {
            Log::warning('OpenAI responded with error', ['body' => $response->json()]);
            return $this->respondWithFallback($chat, $session, $prompt, 'API response error');
        }

        $body = $response->json();
        $botText = $body['choices'][0]['message']['content'] ?? null;

        if (!$botText) {
            return $this->respondWithFallback($chat, $session, $prompt, 'Empty AI reply');
        }

        return $this->respondWithBot($chat, $session, trim($botText));
    }

    protected function techMorahSystemPrompt(): string
    {
        return <<<'PROMPT'
You are TechMorah Copilot for TechMorah Solution LTD (Dar es Salaam Science Park).

Persona: Speak as a seasoned AI and machine-learning practitioner with ~30 years of applied experience across enterprise ML, NLP, computer vision, MLOps, RAG/LLM systems, and digital product delivery. Be clear, practical, and mentor-like — never hype, never invent fake case metrics.

Company facts you must respect:
- Services: web & system design, system development, graphic/UI/UX, IT support, computerised accounting, microfinance solutions, e-commerce, ISP management, payment gateway & integration, enterprise SMS.
- Do NOT pitch core banking / digital banking channels as TechMorah offerings.
- Contact: WhatsApp +255 655 139 724, techmorahsolution@gmail.com, website contact form.
- Delivery flow: discover → design → build & integrate → launch & support.

Behaviour:
- Answer AI/ML questions with frameworks, trade-offs, and next steps (data readiness, baselines, evaluation, monitoring, human-in-the-loop).
- Tie recommendations to TechMorah delivery when useful.
- Keep replies concise (usually under 180 words) with short bullets when listing options.
- For commercial scoping, invite WhatsApp/contact handoff.
PROMPT;
    }

    protected function respondViaMistral(Chat $chat, string $session, string $prompt)
    {
        $apiKey = env('MISTRAL_API_KEY', env('OPENAI_API_KEY'));
        $model = env('AI_MODEL', 'open-mixtral-8x7b');

        if (empty($apiKey)) {
            return $this->respondWithFallback($chat, $session, $prompt, 'Missing Mistral API key');
        }

        $messages = $this->conversationHistory($chat);
        array_unshift($messages, [
            'role' => 'system',
            'content' => $this->techMorahSystemPrompt(),
        ]);

        $payload = [
            'model' => $model,
            'messages' => $messages,
            'temperature' => 0.7,
            'top_p' => 0.95,
            'max_tokens' => 600,
        ];

        try {
            $response = Http::withToken($apiKey)
                ->timeout(20)
                ->post('https://api.mistral.ai/v1/chat/completions', $payload);
        } catch (\Throwable $th) {
            Log::error('Mistral request failed', ['exception' => $th]);
            return $this->respondWithFallback($chat, $session, $prompt, 'Mistral API request exception');
        }

        if ($response->failed()) {
            Log::warning('Mistral responded with error', ['body' => $response->json()]);
            return $this->respondWithFallback($chat, $session, $prompt, 'Mistral API response error');
        }

        $body = $response->json();
        $botText = $body['choices'][0]['message']['content'] ?? null;

        if (!$botText) {
            return $this->respondWithFallback($chat, $session, $prompt, 'Empty Mistral reply');
        }

        return $this->respondWithBot($chat, $session, $botText);
    }

    protected function conversationHistory(Chat $chat): array
    {
        return $chat->messages()
            ->orderByDesc('created_at')
            ->take(8)
            ->get()
            ->reverse()
            ->map(function ($message) {
                return [
                    'role' => $message->sender_type === 'bot' ? 'assistant' : 'user',
                    'content' => $message->body,
                ];
            })
            ->values()
            ->all();
    }

    protected function extractHuggingFaceText($payload): ?string
    {
        if (isset($payload['generated_text'])) {
            return trim((string) $payload['generated_text']);
        }

        if (is_array($payload)) {
            $first = $payload[0] ?? null;
            if (is_array($first)) {
                if (isset($first['generated_text'])) {
                    return trim((string) $first['generated_text']);
                }

                if (isset($first['content'][0]['text'])) {
                    return trim((string) $first['content'][0]['text']);
                }

                if (isset($first['text'])) {
                    return trim((string) $first['text']);
                }
            }
        }

        return null;
    }

    protected function respondWithBot(Chat $chat, string $session, string $text, bool $fallback = false, ?string $meta = null)
    {
        $botMessage = $chat->messages()->create([
            'sender_type' => 'bot',
            'body' => $text,
        ]);

        return response()->json([
            'status' => 'ok',
            'reply' => $text,
            'bot' => $botMessage,
            'session_id' => $session,
            'fallback' => $fallback,
            'meta' => $meta,
        ]);
    }

    protected function respondWithFallback(Chat $chat, string $session, string $prompt, string $reason)
    {
        $text = $this->fallbackReply($prompt);
        return $this->respondWithBot($chat, $session, $text, true, $reason);
    }

    protected function fallbackReply(string $prompt): string
    {
        $prompt = strtolower($prompt);
        $persona = 'I am TechMorah Copilot — an AI/ML advisor guiding practical automation and TechMorah digital delivery.';

        if (str_contains($prompt, 'machine learning') || str_contains($prompt, 'mlops') || str_contains($prompt, 'deep learning')) {
            return 'Start with the decision to improve, then data quality and baseline metrics, then model complexity. TechMorah path: KPIs → data audit → baseline → model → evaluate → deploy with monitoring into web/WhatsApp workflows. Share your use case for a fit stack.';
        }

        if (str_contains($prompt, 'rag') || str_contains($prompt, 'fine-tun') || str_contains($prompt, 'llm') || str_contains($prompt, 'gpt')) {
            return 'RAG fits changing knowledge bases; fine-tuning helps stable tone/format tasks. Many support desks use RAG + tools + human escalation. TechMorah embeds assistants with auth, logging, and handoff. WhatsApp +255 655 139 724 for scoping.';
        }

        if (str_contains($prompt, 'ai') || str_contains($prompt, 'nlp') || str_contains($prompt, 'automation')) {
            return 'Business AI works in layers: workflow capture → RAG/tools or fine-tune → guardrails → channel embed (web/WhatsApp). Tell me the channel and job-to-be-done.';
        }

        if (str_contains($prompt, 'microfinance') || str_contains($prompt, 'mfi') || str_contains($prompt, 'loan')) {
            return 'TechMorah builds microfinance solutions — loans, savings, members, approvals, reporting. Optional AI later: risk scoring/OCR after core workflows are solid. WhatsApp +255 655 139 724.';
        }

        if (str_contains($prompt, 'isp') || str_contains($prompt, 'fibre') || str_contains($prompt, 'fiber')) {
            return 'TechMorah delivers ISP management — packages, subscribers, billing, support, payments. Later ML: churn, ticket classification, anomaly alerts.';
        }

        if (str_contains($prompt, 'e-commerce') || str_contains($prompt, 'ecommerce') || str_contains($prompt, 'shop')) {
            return 'We build e-commerce with catalogue, cart, checkout, and admin. AI add-ons after checkout reliability: search, recommendations, support bots.';
        }

        if (str_contains($prompt, 'pay') || str_contains($prompt, 'lipa') || str_contains($prompt, 'gateway') || str_contains($prompt, 'm-pesa')) {
            return 'Payment gateway & integration: collections, disbursements, sandboxes, callbacks, reconciliation. Security first — signed callbacks and idempotent transactions. WhatsApp +255 655 139 724.';
        }

        if (str_contains($prompt, 'price') || str_contains($prompt, 'cost') || str_contains($prompt, 'quote')) {
            return 'Pricing depends on scope and delivery model. AI/ML is quoted after data readiness and KPI clarity. Share modules on the contact page or WhatsApp +255 655 139 724.';
        }

        if (str_contains($prompt, 'support') || str_contains($prompt, 'hosting') || str_contains($prompt, 'vps')) {
            return 'IT support, monitoring, Linux VPS/shared hosting, SSL, and handover runbooks are available. Describe your environment.';
        }

        if (str_contains($prompt, 'service') || str_contains($prompt, 'website') || str_contains($prompt, 'system') || str_contains($prompt, 'design')) {
            return 'TechMorah covers web & systems, UI/UX, IT support, accounting, microfinance, e-commerce, ISP management, payment gateways, and SMS. Which area should we start with?';
        }

        return $persona . ' Ask a specific question (for example: “Design a payment collections sandbox” or “Do we need RAG or fine-tuning?”). WhatsApp +255 655 139 724 for human handoff.';
    }
}

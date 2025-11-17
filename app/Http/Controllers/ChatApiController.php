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
        $chat->loadMissing('messages');

        // Save user message so it appears in history
        $chat->messages()->create([
            'sender_type' => 'user',
            'body' => $data['body'],
        ]);

        $provider = strtolower((string) env('AI_PROVIDER', 'openai'));

        if ($provider === 'huggingface') {
            return $this->respondViaHuggingFace($chat, $session, $data['body']);
        }

        if ($provider === 'mistral') {
            return $this->respondViaMistral($chat, $session, $data['body']);
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
            'content' => 'You are TechMorah Solution LTD’s AI copilot. Answer like a proactive consultant, keep it concise, and always reference TechMorah services, WhatsApp +255 655 139 724, or the contact route when relevant.',
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

    protected function respondViaOpenAi(Chat $chat, string $session, string $prompt)
    {
        $apiKey = env('OPENAI_API_KEY');
        $model = env('AI_MODEL', 'gpt-4o-mini');

        if (empty($apiKey)) {
            return $this->respondWithFallback($chat, $session, $prompt, 'Missing OpenAI API key');
        }

        $payload = [
            'model' => $model,
            'input' => $this->buildResponseInput($chat),
            'max_output_tokens' => 600,
        ];

        try {
            $response = Http::withToken($apiKey)
                ->timeout(20)
                ->post('https://api.openai.com/v1/responses', $payload);
        } catch (\Throwable $th) {
            Log::error('OpenAI request failed', ['exception' => $th]);
            return $this->respondWithFallback($chat, $session, $prompt, 'API request exception');
        }

        if ($response->failed()) {
            Log::warning('OpenAI responded with error', ['body' => $response->json()]);
            return $this->respondWithFallback($chat, $session, $prompt, 'API response error');
        }

        $body = $response->json();
        $botText = $this->extractResponseText($body);

        if (!$botText) {
            return $this->respondWithFallback($chat, $session, $prompt, 'Empty AI reply');
        }

        return $this->respondWithBot($chat, $session, $botText);
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
            'content' => 'You are TechMorah Solution LTD’s AI copilot. Answer like a proactive consultant, keep it concise, and always reference TechMorah services, WhatsApp +255 655 139 724, or the contact route when relevant.',
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

    protected function buildResponseInput(Chat $chat): array
    {
        $messages = $this->conversationHistory($chat);

        array_unshift($messages, [
            'role' => 'system',
            'content' => 'You are TechMorah Solution LTD’s AI copilot. Answer like a proactive consultant, keep it concise, and always reference TechMorah services, WhatsApp +255 655 139 724, or the contact route when relevant.',
        ]);

        return array_map(function ($message) {
            return [
                'role' => $message['role'],
                'content' => [
                    [
                        'type' => 'input_text',
                        'text' => $message['content'],
                    ],
                ],
            ];
        }, $messages);
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

    protected function extractResponseText(array $payload): ?string
    {
        $output = $payload['output'] ?? $payload['response']['output'] ?? null;

        if (is_array($output)) {
            foreach ($output as $segment) {
                // Handle message objects that contain a content array
                if (($segment['type'] ?? null) === 'message' && isset($segment['content']) && is_array($segment['content'])) {
                    foreach ($segment['content'] as $content) {
                        if (($content['type'] ?? null) === 'output_text' && isset($content['text'])) {
                            return trim($content['text']);
                        }
                    }
                }

                // Handle direct output_text entries
                if (($segment['type'] ?? null) === 'output_text' && isset($segment['content'][0]['text'])) {
                    return trim($segment['content'][0]['text']);
                }
            }
        }

        // Fallback to legacy choices array if present
        if (!empty($payload['choices'][0]['message']['content'])) {
            return trim($payload['choices'][0]['message']['content']);
        }

        if (!empty($payload['content'][0]['text'])) {
            return trim($payload['content'][0]['text']);
        }

        return null;
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

        if (str_contains($prompt, 'ai')) {
            return 'We embed AI copilots into WhatsApp, web, and voice flows. Tell me your current system and we’ll map the rollout, or tap WhatsApp +255 655 139 724 for a live engineer.';
        }

        if (str_contains($prompt, 'price') || str_contains($prompt, 'cost')) {
            return 'Pricing is tailored per scope. Share the modules you need and I can outline options, or our contact page can collect specs for an exact quote.';
        }

        if (str_contains($prompt, 'support')) {
            return 'Our 24/7 IT support desk routes WhatsApp, FaceTime, and phone into a single timeline with proactive alerts. Ask how many sites you run and we’ll shape the plan.';
        }

        if (str_contains($prompt, 'account')) {
            return 'Computerized accounting bundles Power BI dashboards, approvals, and compliance-ready exports. Want me to outline how it plugs into your current finance tools?';
        }

        if (str_contains($prompt, 'website') || str_contains($prompt, 'system')) {
            return 'We ship Laravel + React portals, e-commerce, and custom CRMs that inherit your brand. Describe your goal and I’ll suggest the best TechMorah squad to engage.';
        }

        return 'I’m here to guide you through TechMorah Solution LTD services—AI integration, IT support, accounting automations, and web systems. Ask away or jump to WhatsApp +255 655 139 724 for a human hand-off.';
    }
}

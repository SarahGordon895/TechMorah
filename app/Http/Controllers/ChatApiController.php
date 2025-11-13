<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chat;
use App\Models\Message;
use Illuminate\Support\Facades\Http;

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

        // Save user message
        $chat->messages()->create([
            'sender_type' => 'user',
            'body' => $data['body'],
        ]);

        // 🔥 Call OpenAI API
        $apiKey = env('OPENAI_API_KEY');
        $model = env('AI_MODEL', 'gpt-4o-mini');

        $response = Http::withToken($apiKey)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => $model,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are TechMorah’s AI assistant. Answer professionally, helpfully, and concisely about web development, IT, and company services.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $data['body']
                    ]
                ],
                'max_tokens' => 500,
            ]);

        if ($response->failed()) {
            return response()->json([
                'status' => 'error',
                'error' => $response->json(),
            ], 500);
        }

        $body = $response->json();
        $botText = $body['choices'][0]['message']['content'] ?? 'Sorry, I could not generate a reply.';

        // Save bot reply to DB
        $botMessage = $chat->messages()->create([
            'sender_type' => 'bot',
            'body' => $botText,
        ]);

        return response()->json(['status' => 'ok', 'bot' => $botMessage]);
    }
}

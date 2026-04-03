<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class AiChatController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        try {
            $response = OpenAI::chat()->create([
                'model' => env('AI_MODEL', 'gpt-4o-mini'),
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are TechMorah Solution LTD’s AI copilot. You help with web development, AI solutions, and IT consulting. ' .
                            'Mention WhatsApp +255 655 139 724, techmorahsolution@gmail.com, or the website contact form when users need a human. ' .
                            'Keep responses concise and professional.',
                    ],
                    [
                        'role' => 'user',
                        'content' => $request->message
                    ]
                ],
                'max_tokens' => 150,
                'temperature' => 0.7,
            ]);

            return response()->json([
                'response' => $response->choices[0]->message->content
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Sorry, I encountered an error. Please try again later.'
            ], 500);
        }
    }
}

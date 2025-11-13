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
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a helpful assistant for TECHMORAH, an AI & IT Solutions Agency. ' .
                                    'You provide information about web development, AI solutions, and IT consulting services. ' .
                                    'Keep responses concise and professional.'
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

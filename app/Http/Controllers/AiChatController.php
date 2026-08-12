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

        $system = 'You are TechMorah Copilot for TechMorah Solution LTD. Speak as a seasoned AI/ML practitioner (~30 years applied experience). '
            . 'Advise on ML strategy, RAG vs fine-tuning, data readiness, and digital delivery. '
            . 'Company services: web & systems, UI/UX, IT support, accounting, microfinance, e-commerce, ISP management, payment gateways, SMS. '
            . 'Do not pitch core banking channels. Contact: WhatsApp +255 655 139 724, techmorahsolution@gmail.com. Keep replies concise and practical.';

        try {
            $response = OpenAI::chat()->create([
                'model' => env('AI_MODEL', 'gpt-4o-mini'),
                'messages' => [
                    ['role' => 'system', 'content' => $system],
                    ['role' => 'user', 'content' => $request->message],
                ],
                'max_tokens' => 450,
                'temperature' => 0.6,
            ]);

            return response()->json([
                'response' => $response->choices[0]->message->content,
                'reply' => $response->choices[0]->message->content,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Sorry, I encountered an error. Please try again later.',
                'reply' => 'I hit a temporary model error. Ask again, or WhatsApp +255 655 139 724 for a human handoff.',
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Twilio\TwiML\VoiceResponse;
use Twilio\Rest\Client;

class VoiceController extends Controller
{
    // Handle incoming voice calls
    public function handleIncomingCall(Request $request)
    {
        $response = new VoiceResponse();
        
        // Get caller information
        $from = $request->input('From');
        $to = $request->input('To');
        
        // Create conversation record
        $sessionId = 'call_' . preg_replace('/[^0-9]/', '', $from);
        
        // Welcome message
        $gather = $response->gather([
            'input' => 'speech',
            'action' => route('voice.process.speech'),
            'method' => 'POST',
            'timeout' => 5,
            'language' => 'en-US',
            'hints' => 'web development, AI solutions, IT consulting, pricing, support, sales'
        ]);
        
        $gather->say('Welcome to TechMorah, your AI and IT solutions partner. How can I help you today? You can ask about web development, AI solutions, IT consulting, pricing, or support.', [
            'voice' => 'alice',
            'language' => 'en-US'
        ]);
        
        // If no speech input, provide options
        $response->say('I didn\'t catch that. For web development, press 1. For AI solutions, press 2. For IT consulting, press 3. For pricing information, press 4. To speak with an agent, press 0.', [
            'voice' => 'alice',
            'language' => 'en-US'
        ]);
        
        $response->gather([
            'input' => 'dtmf',
            'action' => route('voice.process.dtmf'),
            'method' => 'POST',
            'timeout' => 3
        ]);
        
        return response($response, 200, ['Content-Type' => 'text/xml']);
    }
    
    // Process speech input
    public function processSpeech(Request $request)
    {
        $speechResult = $request->input('SpeechResult');
        $from = $request->input('From');
        $confidence = $request->input('Confidence');
        
        if ($speechResult && $confidence > 0.5) {
            // Get AI response
            $aiResponse = $this->getAIResponseForCall($speechResult, $from);
            
            $response = new VoiceResponse();
            $response->say($aiResponse, [
                'voice' => 'alice',
                'language' => 'en-US'
            ]);
            
            // Ask if they need anything else
            $gather = $response->gather([
                'input' => 'speech',
                'action' => route('voice.process.speech'),
                'method' => 'POST',
                'timeout' => 5,
                'language' => 'en-US'
            ]);
            
            $gather->say('Is there anything else I can help you with?', [
                'voice' => 'alice',
                'language' => 'en-US'
            ]);
            
            return response($response, 200, ['Content-Type' => 'text/xml']);
        }
        
        // Low confidence or no speech, try again
        $response = new VoiceResponse();
        $response->say('I didn\'t quite catch that. Could you please repeat?', [
            'voice' => 'alice',
            'language' => 'en-US'
        ]);
        
        return $this->handleIncomingCall($request);
    }
    
    // Process DTMF input
    public function processDTMF(Request $request)
    {
        $digit = $request->input('Digits');
        $from = $request->input('From');
        
        $response = new VoiceResponse();
        
        switch ($digit) {
            case '1':
                $response->say('For web development services, we offer custom website development, e-commerce solutions, responsive design, and web application development. Our team specializes in modern technologies like Laravel, React, and Vue.js. Would you like to know more about any specific service?', [
                    'voice' => 'alice',
                    'language' => 'en-US'
                ]);
                break;
                
            case '2':
                $response->say('For AI solutions, we provide machine learning models, natural language processing, computer vision, and AI automation. We can help integrate AI into your existing systems or build custom AI applications. What specific AI solution are you interested in?', [
                    'voice' => 'alice',
                    'language' => 'en-US'
                ]);
                break;
                
            case '3':
                $response->say('For IT consulting, we offer system architecture design, cloud migration, cybersecurity assessments, and IT infrastructure optimization. Our consultants help businesses leverage technology for growth. What IT challenge are you facing?', [
                    'voice' => 'alice',
                    'language' => 'en-US'
                ]);
                break;
                
            case '4':
                $response->say('Our pricing varies based on project scope and complexity. Web development projects start at $2,000, AI solutions from $5,000, and IT consulting at $150 per hour. We offer custom quotes based on your specific needs. Would you like to schedule a consultation?', [
                    'voice' => 'alice',
                    'language' => 'en-US'
                ]);
                break;
                
            case '0':
                $response->say('Connecting you to a human agent. Please stay on the line.', [
                    'voice' => 'alice',
                    'language' => 'en-US'
                ]);
                $response->dial(env('COMPANY_PHONE', '+1234567890'));
                break;
                
            default:
                $response->say('Invalid selection. Please try again.', [
                    'voice' => 'alice',
                    'language' => 'en-US'
                ]);
                return $this->handleIncomingCall($request);
        }
        
        // Continue conversation
        $gather = $response->gather([
            'input' => 'speech',
            'action' => route('voice.process.speech'),
            'method' => 'POST',
            'timeout' => 5,
            'language' => 'en-US'
        ]);
        
        $gather->say('Is there anything else I can help you with?', [
            'voice' => 'alice',
            'language' => 'en-US'
        ]);
        
        return response($response, 200, ['Content-Type' => 'text/xml']);
    }
    
    // Get AI response for voice calls
    private function getAIResponseForCall($message, $from)
    {
        $aiText = $this->fetchAiResponse($message, $from);

        if ($aiText) {
            return $this->convertToSpeechFriendly($aiText);
        }

        return "I apologize, but I'm having trouble processing your request right now. Please try again or press 0 to speak with an agent.";
    }
    
    // Convert text to speech-friendly format
    private function convertToSpeechFriendly($text)
    {
        // Replace technical terms with more speech-friendly alternatives
        $replacements = [
            'AI' => 'A I',
            'API' => 'A P I',
            'UI' => 'U I',
            'UX' => 'U X',
            'JavaScript' => 'Java Script',
            'TypeScript' => 'Type Script',
            'GitHub' => 'Git Hub',
            'LinkedIn' => 'Linked In',
            'WordPress' => 'Word Press',
            'e-commerce' => 'e commerce',
            'SaaS' => 'S A A S',
            'B2B' => 'B to B',
            'B2C' => 'B to C'
        ];
        
        foreach ($replacements as $from => $to) {
            $text = str_replace($from, $to, $text);
        }
        
        // Break down long sentences
        $sentences = preg_split('/(?<=[.?!])\s+/', $text);
        $speechText = '';
        
        foreach ($sentences as $sentence) {
            if (strlen($sentence) > 100) {
                // Break long sentences
                $words = explode(' ', $sentence);
                $chunks = array_chunk($words, 15);
                foreach ($chunks as $chunk) {
                    $speechText .= implode(' ', $chunk) . '. ';
                }
            } else {
                $speechText .= $sentence . ' ';
            }
        }
        
        return trim($speechText);
    }

    private function fetchAiResponse($message, $from)
    {
        $apiKey = env('OPENAI_API_KEY');
        $model = env('AI_MODEL', 'gpt-4o-mini');

        if (!$apiKey) {
            \Log::warning('OpenAI API key not configured for voice assistant');
            return null;
        }

        $payload = [
            'model' => $model,
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are TechMorah’s AI voice assistant. Reply conversationally (max 3 sentences) about web, AI, IT support, and pricing.'
                ],
                [
                    'role' => 'user',
                    'content' => $message
                ]
            ],
            'max_tokens' => 300,
        ];

        try {
            $response = Http::withToken($apiKey)
                ->post('https://api.openai.com/v1/chat/completions', $payload);

            if ($response->failed()) {
                \Log::error('OpenAI voice assistant error', ['body' => $response->body()]);
                return null;
            }

            return $response->json()['choices'][0]['message']['content'] ?? null;
        } catch (\Throwable $th) {
            \Log::error('OpenAI voice assistant exception', ['message' => $th->getMessage()]);
            return null;
        }
    }
    
    // Handle call status callbacks
    public function handleCallStatus(Request $request)
    {
        $callStatus = $request->input('CallStatus');
        $callSid = $request->input('CallSid');
        $from = $request->input('From');
        
        // Log call status for analytics
        \Log::info('Call status update', [
            'call_sid' => $callSid,
            'status' => $callStatus,
            'from' => $from,
            'timestamp' => now()
        ]);
        
        return response()->json(['status' => 'received']);
    }
    
    // Initiate outbound call
    public function initiateCall(Request $request)
    {
        $data = $request->validate([
            'phone_number' => 'required|string',
            'message' => 'nullable|string'
        ]);
        
        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_FROM');
        
        $client = new Client($sid, $token);
        
        try {
            $call = $client->calls->create(
                $data['phone_number'],
                $from,
                [
                    'url' => route('voice.incoming'),
                    'method' => 'POST',
                    'statusCallback' => route('voice.status'),
                    'statusCallbackMethod' => 'POST'
                ]
            );
            
            return response()->json([
                'status' => 'initiated',
                'call_sid' => $call->sid
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Support\Facades\Http;
use Twilio\Rest\Client;

class WhatsAppController extends Controller
{
    // Handle incoming WhatsApp messages
    public function handleIncomingMessage(Request $request)
    {
        $from = $request->input('From');
        $body = $request->input('Body');
        $mediaUrl = $request->input('MediaUrl0');
        $mediaType = $request->input('MediaContentType0');
        
        // Extract phone number from WhatsApp format
        $phoneNumber = str_replace('whatsapp:', '', $from);
        $sessionId = 'whatsapp_' . preg_replace('/[^0-9]/', '', $phoneNumber);
        
        // Handle different message types
        if ($mediaUrl) {
            $message = $this->handleMediaMessage($mediaUrl, $mediaType, $sessionId, $phoneNumber);
        } else {
            $message = $this->handleTextMessage($body, $sessionId, $phoneNumber);
        }
        
        return $message;
    }
    
    // Handle text messages
    private function handleTextMessage($body, $sessionId, $phoneNumber)
    {
        // Create or get conversation
        $conversation = Conversation::firstOrCreate([
            'session_id' => $sessionId
        ], [
            'channel' => 'whatsapp',
            'phone_number' => $phoneNumber,
            'status' => 'active'
        ]);
        
        // Store user message
        $userMessage = $conversation->messages()->create([
            'sender_type' => 'user',
            'body' => $body,
            'meta' => [
                'channel' => 'whatsapp',
                'phone_number' => $phoneNumber
            ]
        ]);
        
        // Get AI response
        $aiResponse = $this->getAIResponse($body, $conversation->id, 'whatsapp');
        
        // Store AI response
        $botMessage = $conversation->messages()->create([
            'sender_type' => 'bot',
            'body' => $aiResponse,
            'meta' => [
                'channel' => 'whatsapp',
                'response_type' => 'ai'
            ]
        ]);
        
        // Send WhatsApp response
        $this->sendWhatsAppMessage($phoneNumber, $aiResponse);
        
        return response('<Response/>', 200, ['Content-Type' => 'text/xml']);
    }
    
    // Handle media messages
    private function handleMediaMessage($mediaUrl, $mediaType, $sessionId, $phoneNumber)
    {
        $conversation = Conversation::firstOrCreate([
            'session_id' => $sessionId
        ], [
            'channel' => 'whatsapp',
            'phone_number' => $phoneNumber,
            'status' => 'active'
        ]);
        
        // Store media message
        $conversation->messages()->create([
            'sender_type' => 'user',
            'body' => "[Media: {$mediaType}]",
            'meta' => [
                'channel' => 'whatsapp',
                'phone_number' => $phoneNumber,
                'media_url' => $mediaUrl,
                'media_type' => $mediaType
            ]
        ]);
        
        // Generate appropriate response based on media type
        $response = $this->generateMediaResponse($mediaType);
        
        // Send response
        $this->sendWhatsAppMessage($phoneNumber, $response);
        
        return response('<Response/>', 200, ['Content-Type' => 'text/xml']);
    }
    
    // Generate response for media messages
    private function generateMediaResponse($mediaType)
    {
        switch ($mediaType) {
            case 'image/jpeg':
            case 'image/png':
            case 'image/gif':
                return "📷 Thank you for sharing the image! I can see you've sent a picture. How can I help you regarding this image or any of our services at TechMorah?";
                
            case 'audio/mpeg':
            case 'audio/ogg':
            case 'audio/wav':
                return "🎵 I received your audio message. While I can't listen to audio files directly, I'm here to help via text. What can I assist you with today?";
                
            case 'video/mp4':
            case 'video/3gpp':
                return "🎥 I see you've sent a video! That looks interesting. How can I help you with our web development, AI solutions, or IT consulting services?";
                
            case 'application/pdf':
                return "📄 Thank you for the PDF document. I can't directly read PDFs, but I'd be happy to discuss how TechMorah can help with your project. What services are you interested in?";
                
            default:
                return "📎 Thank you for sharing a file! I can see you've sent a document. How can I assist you with TechMorah's services today?";
        }
    }
    
    // Get AI response optimized for WhatsApp
    private function getAIResponse($message, $conversationId, $channel)
    {
        // Get conversation history
        $conversation = Conversation::find($conversationId);
        $recentMessages = $conversation->messages()->orderBy('created_at', 'desc')->limit(10)->get();
        
        // Build context for AI
        $contextMessages = [
            [
                'role' => 'system',
                'content' => "You are TechMorah's AI assistant for WhatsApp. You provide professional, helpful responses about web development, AI solutions, and IT consulting services. You can use emojis and formatting. Keep responses conversational and engaging. Responses can be more detailed than SMS but should still be mobile-friendly."
            ]
        ];
        
        // Add conversation history
        foreach ($recentMessages->reverse() as $msg) {
            $contextMessages[] = [
                'role' => $msg->sender_type === 'user' ? 'user' : 'assistant',
                'content' => $msg->body
            ];
        }
        
        $response = Http::withToken(env('OPENAI_API_KEY'))
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => env('AI_MODEL', 'gpt-4o-mini'),
                'messages' => $contextMessages,
                'max_tokens' => 500,
                'temperature' => 0.7
            ]);
        
        if ($response->failed()) {
            return "I'm sorry, I'm having trouble processing your request right now. Please try again or contact us at techmorahsolution@gmail.com 📧";
        }
        
        return $response->json()['choices'][0]['message']['content'] ?? "I apologize, but I couldn't generate a response.";
    }
    
    // Send WhatsApp message
    private function sendWhatsAppMessage($to, $message)
    {
        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_WHATSAPP_FROM');
        
        $client = new Client($sid, $token);
        
        try {
            $client->messages->create('whatsapp:' . $to, [
                'from' => 'whatsapp:' . $from,
                'body' => $message
            ]);
        } catch (\Exception $e) {
            \Log::error('WhatsApp message failed', [
                'error' => $e->getMessage(),
                'to' => $to,
                'message' => $message
            ]);
        }
    }
    
    // Send WhatsApp message with media
    public function sendWhatsAppMedia(Request $request)
    {
        $data = $request->validate([
            'to' => 'required|string',
            'message' => 'required|string',
            'media_url' => 'required|url',
            'media_type' => 'required|string'
        ]);
        
        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_WHATSAPP_FROM');
        
        $client = new Client($sid, $token);
        
        try {
            $message = $client->messages->create('whatsapp:' . $data['to'], [
                'from' => 'whatsapp:' . $from,
                'body' => $data['message'],
                'mediaUrl' => [$data['media_url']]
            ]);
            
            return response()->json([
                'status' => 'sent',
                'message_sid' => $message->sid
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
    // Send interactive WhatsApp message
    public function sendInteractiveMessage(Request $request)
    {
        $data = $request->validate([
            'to' => 'required|string',
            'body' => 'required|string',
            'buttons' => 'required|array',
            'buttons.*.text' => 'required|string',
            'buttons.*.action' => 'required|string'
        ]);
        
        $sid = env('TWILIO_ACCOUNT_SID');
        $token = env('TWILIO_AUTH_TOKEN');
        $from = env('TWILIO_WHATSAPP_FROM');
        
        $client = new Client($sid, $token);
        
        try {
            // Create interactive message with buttons
            $messageBody = $data['body'] . "\n\n";
            foreach ($data['buttons'] as $index => $button) {
                $messageBody .= sprintf("%d. %s\n", $index + 1, $button['text']);
            }
            
            $message = $client->messages->create('whatsapp:' . $data['to'], [
                'from' => 'whatsapp:' . $from,
                'body' => $messageBody
            ]);
            
            return response()->json([
                'status' => 'sent',
                'message_sid' => $message->sid
            ]);
            
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 500);
        }
    }
    
    // Get WhatsApp conversation history
    public function getConversationHistory(Request $request)
    {
        $phoneNumber = $request->input('phone_number');
        $sessionId = 'whatsapp_' . preg_replace('/[^0-9]/', '', $phoneNumber);
        
        $conversation = Conversation::where('session_id', $sessionId)->first();
        
        if (!$conversation) {
            return response()->json(['messages' => []]);
        }
        
        $messages = $conversation->messages()
            ->orderBy('created_at', 'asc')
            ->get();
        
        return response()->json(['messages' => $messages]);
    }
    
    // Send broadcast message to multiple WhatsApp numbers
    public function sendBroadcast(Request $request)
    {
        $data = $request->validate([
            'phone_numbers' => 'required|array',
            'phone_numbers.*' => 'required|string',
            'message' => 'required|string'
        ]);
        
        $results = [];
        
        foreach ($data['phone_numbers'] as $phoneNumber) {
            try {
                $this->sendWhatsAppMessage($phoneNumber, $data['message']);
                $results[] = ['phone_number' => $phoneNumber, 'status' => 'sent'];
            } catch (\Exception $e) {
                $results[] = ['phone_number' => $phoneNumber, 'status' => 'error', 'error' => $e->getMessage()];
            }
        }
        
        return response()->json(['results' => $results]);
    }
}

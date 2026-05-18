<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ChatApiController;
use App\Http\Controllers\AiChatController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\VoiceController;
use App\Http\Controllers\WhatsAppController;

/*
|--------------------------------------------------------------------------
| Voice Call Integration
|--------------------------------------------------------------------------
*/
Route::post('/voice/incoming', [VoiceController::class, 'handleIncomingCall'])->name('voice.incoming');
Route::post('/voice/process/speech', [VoiceController::class, 'processSpeech'])->name('voice.process.speech');
Route::post('/voice/process/dtmf', [VoiceController::class, 'processDTMF'])->name('voice.process.dtmf');
Route::post('/voice/status', [VoiceController::class, 'handleCallStatus'])->name('voice.status');
Route::post('/voice/call', [VoiceController::class, 'initiateCall'])->name('voice.call');

/*
|--------------------------------------------------------------------------
| WhatsApp Integration
|--------------------------------------------------------------------------
*/
Route::post('/whatsapp/incoming', [WhatsAppController::class, 'handleIncomingMessage'])->name('whatsapp.incoming');
Route::post('/whatsapp/send', [WhatsAppController::class, 'sendWhatsAppMessage'])->name('whatsapp.send');
Route::post('/whatsapp/send-media', [WhatsAppController::class, 'sendWhatsAppMedia'])->name('whatsapp.send.media');
Route::post('/whatsapp/interactive', [WhatsAppController::class, 'sendInteractiveMessage'])->name('whatsapp.interactive');
Route::post('/whatsapp/broadcast', [WhatsAppController::class, 'sendBroadcast'])->name('whatsapp.broadcast');
Route::get('/whatsapp/history', [WhatsAppController::class, 'getConversationHistory'])->name('whatsapp.history');

/*
|--------------------------------------------------------------------------
| Chat API (AI + user messages + SMS)
|--------------------------------------------------------------------------
*/
Route::post('/chat/send', [ChatApiController::class, 'sendMessage'])->name('chat.send');
Route::post('/chat/ai', [ChatApiController::class, 'aiReply'])->name('chat.ai'); // AI bot integration
Route::post('/api/ai-chat', [AiChatController::class, 'chat'])->name('ai.chat'); // New AI chat endpoint
Route::post('/sms/send', [SmsController::class, 'sendSms'])->name('sms.send');   // Send SMS (admin-side)

/*
|--------------------------------------------------------------------------
| Main Pages
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/case-studies', [PageController::class, 'blog'])->name('case-studies');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/contact', [PageController::class, 'contact'])->name('contact');

/*
|--------------------------------------------------------------------------
| Contact Form
|--------------------------------------------------------------------------
*/
Route::post('/contact/send', [ContactController::class, 'send'])->name('contact.send');

/*
|--------------------------------------------------------------------------
| Chat UI (Front-end view)
|--------------------------------------------------------------------------
*/
Route::get('/chat', [ChatController::class, 'index'])->name('chat.index');

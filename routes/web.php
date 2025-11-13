<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ChatApiController;
use App\Http\Controllers\SmsController;
use App\Http\Controllers\AiChatController;

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

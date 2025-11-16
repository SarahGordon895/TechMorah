<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    /**
     * Display the AI chat interface.
     */
    public function index()
    {
        return view('chat');
    }
}

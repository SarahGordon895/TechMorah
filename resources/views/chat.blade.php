<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - AI Chat Assistant</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Bootstrap CSS (optional, for utility classes) -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Animate CSS -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Style -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Styles / Scripts -->
    @if(file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>
            @import url('https://cdn.tailwindcss.com');
        </style>
    @endif

    <style>
        body { --default-font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif; }
        .message-enter { animation: slideInUp 0.4s ease-out; }
        @keyframes slideInUp { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
        .pulse-dot { animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite; }
        @keyframes pulse { 0%, 100% { opacity: 1; } 50% { opacity: .5; } }
        #chatMessages { scroll-behavior: smooth; }
    </style>
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] dark:text-[#EDEDEC]">
    <!-- Navigation -->
    <nav class="sticky top-0 z-50 bg-white dark:bg-[#161615] border-b border-[#e3e3e0] dark:border-[#3E3E3A] shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-[#FF750F]">{{ config('app.name') }}</a>
                <div class="flex gap-8 items-center">
                    <a href="{{ route('home') }}" class="text-sm hover:text-[#FF750F] transition">Home</a>
                    <a href="{{ route('contact') }}" class="text-sm hover:text-[#FF750F] transition">Contact</a>
                    <a href="{{ route('chat.index') }}" class="text-sm font-medium text-[#FF750F]">Chat</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Chat Container -->
    <div class="min-h-[calc(100vh-4rem)] flex flex-col">
        <div class="flex-1 flex items-center justify-center p-4">
            <div class="w-full max-w-3xl">
                <!-- Chat Header -->
                <div class="bg-gradient-to-r from-[#1b1b18] via-[#2d2d27] to-[#0a0a0a] text-white rounded-t-xl p-8">
                    <h1 class="text-3xl md:text-4xl font-bold mb-2">AI Chat Assistant</h1>
                    <p class="text-gray-300 text-lg">Get instant answers to your questions</p>
                </div>

                <!-- Messages Container -->
                <div id="chatMessages" class="bg-white dark:bg-[#161615] border-x border-[#e3e3e0] dark:border-[#3E3E3A] p-6 h-96 overflow-y-auto">
                    <div class="flex justify-center items-center h-full">
                        <div class="text-center">
                            <div class="inline-block mb-4">
                                <svg class="w-16 h-16 text-[#FF750F]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                            </div>
                            <p class="text-gray-500 dark:text-gray-400 text-lg">Start a conversation...</p>
                        </div>
                    </div>
                </div>

                <!-- Input Area -->
                <div class="bg-white dark:bg-[#161615] border-x border-b border-[#e3e3e0] dark:border-[#3E3E3A] rounded-b-xl p-6">
                    <form id="chatForm" class="flex gap-3">
                        @csrf
                        <input
                            type="text"
                            id="messageInput"
                            placeholder="Type your message..."
                            class="flex-1 px-4 py-3 border border-[#e3e3e0] dark:border-[#3E3E3A] bg-white dark:bg-[#0a0a0a] rounded-lg focus:outline-none focus:ring-2 focus:ring-[#FF750F] transition"
                            required
                        />
                        <button
                            type="submit"
                            class="px-6 py-3 bg-[#FF750F] hover:bg-[#E66500] text-white font-medium rounded-lg transition-colors duration-200 flex items-center gap-2"
                        >
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            <span>Send</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-[#1b1b18] dark:bg-[#0a0a0a] text-white border-t border-[#3E3E3A] mt-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 text-center text-sm text-gray-400">
            <p>&copy; 2025 {{ config('app.name') }}. All rights reserved.</p>
        </div>
    </footer>

    <!-- Chat Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="{{ asset('lib/wow/wow.min.js') }}"></script>
    <script src="{{ asset('lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>

    <script>
        const chatForm = document.getElementById('chatForm');
        const messageInput = document.getElementById('messageInput');
        const chatMessages = document.getElementById('chatMessages');

        chatForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const message = messageInput.value.trim();
            if (!message) return;

            // Add user message
            addMessage(message, 'user');
            messageInput.value = '';
            messageInput.focus();

            try {
                // Show typing indicator
                showTypingIndicator();

                // Send message to backend
                const sendResponse = await fetch('{{ route("chat.send") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ message }),
                });

                if (!sendResponse.ok) {
                    throw new Error('Failed to send message');
                }

                // Get AI reply
                const aiResponse = await fetch('{{ route("chat.ai") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ message }),
                });

                if (!aiResponse.ok) {
                    throw new Error('Failed to get AI response');
                }

                // Remove typing indicator
                removeTypingIndicator();

                const aiData = await aiResponse.json();
                addMessage(aiData.reply || 'Unable to process your request.', 'assistant');

            } catch (error) {
                console.error('Error:', error);
                removeTypingIndicator();
                addMessage('Sorry, there was an error processing your request. Please try again.', 'error');
            }
        });

        function addMessage(text, sender) {
            // Clear placeholder if it's the first message
            if (chatMessages.children.length === 1 && chatMessages.querySelector('div > div')) {
                const placeholder = chatMessages.querySelector('div');
                if (placeholder.textContent.includes('Start a conversation')) {
                    chatMessages.innerHTML = '';
                }
            }

            const messageDiv = document.createElement('div');
            messageDiv.className = `mb-4 flex ${sender === 'user' ? 'justify-end' : 'justify-start'} message-enter`;

            const contentDiv = document.createElement('div');
            contentDiv.className = `max-w-xs lg:max-w-md px-4 py-3 rounded-lg ${
                sender === 'user'
                    ? 'bg-[#FF750F] text-white rounded-br-none shadow-sm'
                    : sender === 'assistant'
                    ? 'bg-gray-100 dark:bg-[#2d2d27] text-gray-900 dark:text-white rounded-bl-none shadow-sm'
                    : 'bg-red-100 dark:bg-red-900/30 text-red-900 dark:text-red-200 rounded-bl-none'
            }`;
            contentDiv.textContent = text;

            messageDiv.appendChild(contentDiv);
            chatMessages.appendChild(messageDiv);

            // Scroll to bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function showTypingIndicator() {
            const messageDiv = document.createElement('div');
            messageDiv.id = 'typingIndicator';
            messageDiv.className = 'mb-4 flex justify-start';

            const contentDiv = document.createElement('div');
            contentDiv.className = 'px-4 py-3 rounded-lg bg-gray-100 dark:bg-[#2d2d27] rounded-bl-none';
            contentDiv.innerHTML = '<span class="flex gap-1"><span class="w-2 h-2 bg-gray-400 rounded-full pulse-dot"></span><span class="w-2 h-2 bg-gray-400 rounded-full pulse-dot" style="animation-delay: 0.2s;"></span><span class="w-2 h-2 bg-gray-400 rounded-full pulse-dot" style="animation-delay: 0.4s;"></span></span>';

            messageDiv.appendChild(contentDiv);
            chatMessages.appendChild(messageDiv);

            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function removeTypingIndicator() {
            const indicator = document.getElementById('typingIndicator');
            if (indicator) indicator.remove();
        }
    </script>
</body>
</html>

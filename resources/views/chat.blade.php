@extends('layouts.app')

@section('title', 'TechMorah AI Copilot | Smart Conversations that Match Your Flow')

@push('styles')
<style>
    :root {
        --ai-dark: #0d1117;
        --ai-mid: #151b24;
        --ai-accent: #00f0ff;
        --ai-orange: #ff7a18;
    }
    .ai-hero {
        background: radial-gradient(circle at 0% 0%, rgba(0, 240, 255, 0.15), transparent 45%),
                    radial-gradient(circle at 100% 0%, rgba(255, 122, 24, 0.12), transparent 45%),
                    linear-gradient(135deg, #0b0f15, #111827 65%, #0b0f15);
        color: #fff;
    }
    .ai-hero .stat-card {
        background: rgba(255, 255, 255, 0.08);
        border: 1px solid rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(6px);
        border-radius: 18px;
    }
    .chat-shell {
        border-radius: 28px;
        background: #fff;
        box-shadow: 0 25px 80px rgba(13, 17, 23, 0.15);
        overflow: hidden;
    }
    .chat-shell.dark {
        background: var(--ai-mid);
        color: #f7f9fb;
    }
    .chat-header {
        background: linear-gradient(120deg, #111827, #0d1117);
        color: #fff;
        padding: 1.5rem 2rem;
    }
    .message-area {
        height: 420px;
        overflow-y: auto;
        padding: 1.5rem;
        background: #f7f9fb;
    }
    .chat-shell.dark .message-area {
        background: #131a24;
    }
    .message-bubble {
        border-radius: 18px;
        padding: 0.9rem 1.1rem;
        max-width: 85%;
        font-size: 0.95rem;
        line-height: 1.5;
        animation: bubbleIn 0.35s ease;
    }
    .message-bubble.user {
        margin-left: auto;
        background: linear-gradient(135deg, var(--ai-orange), #ffb347);
        color: #fff;
        border-bottom-right-radius: 6px;
        box-shadow: 0 10px 30px rgba(255, 122, 24, 0.25);
    }
    .message-bubble.bot {
        background: rgba(13, 17, 23, 0.75);
        border: 1px solid rgba(255, 255, 255, 0.08);
        color: #f0f7ff;
        border-bottom-left-radius: 6px;
    }
    .message-bubble.error {
        background: rgba(220, 53, 69, 0.12);
        color: #dc3545;
        border: 1px solid rgba(220, 53, 69, 0.4);
    }
    .quick-reply {
        border-radius: 999px;
        border: 1px solid rgba(0, 240, 255, 0.4);
        padding: 0.35rem 1rem;
        font-size: 0.85rem;
        color: var(--ai-accent);
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .quick-reply:hover {
        background: rgba(0, 240, 255, 0.08);
    }
    .chat-input {
        border-radius: 999px;
        border: 1px solid #e0e6ef;
        padding: 0.85rem 1.2rem;
    }
    .chat-shell.dark .chat-input {
        background: #111824;
        border-color: rgba(255, 255, 255, 0.1);
        color: #fff;
    }
    @keyframes bubbleIn {
        from { opacity: 0; transform: translateY(8px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .typing-dot {
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.8);
        display: inline-block;
        animation: typing 1s infinite;
    }
    .typing-dot:nth-child(2) { animation-delay: 0.15s; }
    .typing-dot:nth-child(3) { animation-delay: 0.3s; }
    @keyframes typing {
        0%, 80%, 100% { opacity: 0.2; transform: translateY(0); }
        40% { opacity: 1; transform: translateY(-4px); }
    }
    @media (max-width: 991.98px) {
        .chat-shell { border-radius: 20px; }
        .message-area { height: min(50vh, 360px); min-height: 280px; }
    }
    @media (max-width: 575.98px) {
        .chat-header { padding: 1rem 1.25rem; }
        .message-area { height: min(45vh, 320px); padding: 1rem; }
        .chat-input { font-size: 16px; }
    }
</style>
@endpush

@section('content')
@php($sessionId = session()->getId())

<section class="ai-hero py-5">
    <div class="container py-4">
        <div class="row g-4 align-items-center">
            <div class="col-lg-7">
                <span class="badge bg-secondary text-uppercase mb-3">Live Copilot</span>
                <h1 class="display-5 fw-bold mb-3">Chat with TechMorah Solution LTD’s AI Copilot</h1>
                <p class="lead text-white-50 mb-4">Get instant answers about AI integration, IT support, or any service flow. The assistant mirrors our home layout energy and keeps every reply within your current session context.</p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="https://wa.me/255655139724" target="_blank" class="btn btn-outline-light rounded-pill px-4">WhatsApp Hand-off</a>
                    <a href="{{ route('contact') }}" class="btn btn-secondary rounded-pill px-4">Request Human Expert</a>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="stat-card p-4 text-center">
                            <p class="text-white-50 mb-1">Avg. response</p>
                            <h3 class="fw-bold mb-0">1.3s</h3>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="stat-card p-4 text-center">
                            <p class="text-white-50 mb-1">Active chats</p>
                            <h3 class="fw-bold mb-0">+84</h3>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="stat-card p-4">
                            <p class="text-white-50 mb-2">What it can do</p>
                            <ul class="list-unstyled mb-0 small text-white">
                                <li class="mb-1"><i class="bi bi-check-circle me-2 text-secondary"></i> Map services to your workflow</li>
                                <li class="mb-1"><i class="bi bi-check-circle me-2 text-secondary"></i> Draft AI/automation rollout steps</li>
                                <li><i class="bi bi-check-circle me-2 text-secondary"></i> Route you to WhatsApp or contact page</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            <div class="col-lg-4">
                <div class="h-100 p-4 p-lg-5 bg-white shadow-sm rounded-4">
                    <p class="text-primary text-uppercase fw-semibold small mb-2">Connected touchpoints</p>
                    <h3 class="fw-bold">One conversation, every channel</h3>
                    <p class="text-muted">The copilot syncs with WhatsApp, FaceTime, and contact routing so your chat can hand-off without losing context.</p>
                    <div class="d-flex flex-column gap-3 mt-4">
                        <div class="d-flex gap-3 align-items-start">
                            <span class="badge bg-secondary-subtle text-secondary rounded-pill">01</span>
                            <div>
                                <h6 class="mb-1">Real-time AI context</h6>
                                <p class="text-muted small mb-0">Understands TechMorah services, success stories, and pricing cues.</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3 align-items-start">
                            <span class="badge bg-secondary-subtle text-secondary rounded-pill">02</span>
                            <div>
                                <h6 class="mb-1">Human escalation</h6>
                                <p class="text-muted small mb-0">Send the transcript to our contact team instantly.</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3 align-items-start">
                            <span class="badge bg-secondary-subtle text-secondary rounded-pill">03</span>
                            <div>
                                <h6 class="mb-1">Persistent sessions</h6>
                                <p class="text-muted small mb-0">Your conversation stays in sync until you clear it.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="chat-shell dark h-100">
                    <div class="chat-header d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                        <div>
                            <small class="text-white-50">Session {{ substr($sessionId, 0, 6) }}…</small>
                            <h4 class="mb-0">TechMorah Copilot</h4>
                        </div>
                        <div class="d-flex flex-wrap gap-2">
                            <span class="quick-reply" data-reply="How can TechMorah automate my support desk?">Automation</span>
                            <span class="quick-reply" data-reply="Tell me about AI integration packages">AI Packages</span>
                            <span class="quick-reply" data-reply="Guide me to contact TechMorah Solution LTD">Contact</span>
                        </div>
                    </div>
                    <div class="message-area" id="chatMessages">
                        <div class="text-center text-muted">
                            <p class="mb-0">👋 Hi! I’m the TechMorah Copilot. Ask about services, pricing, or integrations.</p>
                        </div>
                    </div>
                    <div class="border-top border-secondary-subtle p-3 p-md-4">
                        <form id="chatForm" class="d-flex flex-column flex-md-row gap-3" autocomplete="off">
                            @csrf
                            <input type="hidden" id="sessionId" value="{{ $sessionId }}">
                            <input type="text" id="messageInput" class="flex-grow-1 chat-input" placeholder="Ask anything about AI, systems, or support…" required>
                            <button type="submit" class="btn btn-secondary px-4 d-flex align-items-center justify-content-center gap-2">
                                <i class="bi bi-send"></i>
                                <span>Send</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="py-5">
    <div class="container">
        <div class="row g-4">
            <div class="col-md-4">
                <div class="p-4 border rounded-4 h-100">
                    <h5>WhatsApp & FaceTime bridge</h5>
                    <p class="text-muted">Continue the chat with a human. We keep the same context in your inbox.</p>
                    <a href="https://wa.me/255655139724" target="_blank" class="fw-semibold text-secondary">Open WhatsApp →</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-4 h-100">
                    <h5>Contact routing</h5>
                    <p class="text-muted">Need a proposal? Let the copilot package your summary before handing off.</p>
                    <a href="{{ route('contact') }}" class="fw-semibold text-secondary">Go to Contact →</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 border rounded-4 h-100">
                    <h5>Service blueprint</h5>
                    <p class="text-muted">Ask the bot for a mini roadmap tailored to Web, IT, Accounting, or AI integration.</p>
                    <a href="{{ route('services') }}" class="fw-semibold text-secondary">View Services →</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts')
<script>
    (function () {
        const chatForm = document.getElementById('chatForm');
        const messageInput = document.getElementById('messageInput');
        const chatMessages = document.getElementById('chatMessages');
        const sessionId = document.getElementById('sessionId').value;
        const quickReplies = document.querySelectorAll('.quick-reply');

        quickReplies.forEach((chip) => chip.addEventListener('click', () => {
            messageInput.value = chip.dataset.reply;
            messageInput.focus();
        }));

        chatForm.addEventListener('submit', async (event) => {
            event.preventDefault();
            const text = messageInput.value.trim();
            if (!text) return;

            pushMessage(text, 'user');
            messageInput.value = '';
            messageInput.focus();

            const typingId = showTyping();

            try {
                const aiResponse = await fetch('{{ route('chat.ai') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    },
                    body: JSON.stringify({ body: text, session_id: sessionId }),
                });

                removeTyping(typingId);

                if (!aiResponse.ok) {
                    throw new Error('AI request failed');
                }

                const payload = await aiResponse.json();
                pushMessage(payload.reply || 'I was unable to craft a response. Please try again.', 'bot');
            } catch (error) {
                console.error(error);
                removeTyping(typingId);
                pushMessage('Sorry, I encountered an issue. Please try again or hop to WhatsApp.', 'error');
            }
        });

        function pushMessage(text, type) {
            if (chatMessages.children.length === 1 && chatMessages.firstElementChild.classList.contains('text-center')) {
                chatMessages.innerHTML = '';
            }

            const wrapper = document.createElement('div');
            wrapper.className = `d-flex mb-3 ${type === 'user' ? 'justify-content-end' : 'justify-content-start'}`;

            const bubble = document.createElement('div');
            bubble.className = `message-bubble ${type}`;
            bubble.textContent = text;

            wrapper.appendChild(bubble);
            chatMessages.appendChild(wrapper);
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }

        function showTyping() {
            const wrapper = document.createElement('div');
            wrapper.className = 'd-flex mb-3 justify-content-start';
            wrapper.id = `typing-${Date.now()}`;

            const bubble = document.createElement('div');
            bubble.className = 'message-bubble bot';
            bubble.innerHTML = '<span class="typing-dot"></span><span class="typing-dot"></span><span class="typing-dot"></span>';

            wrapper.appendChild(bubble);
            chatMessages.appendChild(wrapper);
            chatMessages.scrollTop = chatMessages.scrollHeight;
            return wrapper.id;
        }

        function removeTyping(id) {
            const indicator = document.getElementById(id);
            if (indicator) indicator.remove();
        }
    })();
</script>
@endpush

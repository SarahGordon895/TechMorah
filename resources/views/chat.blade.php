@extends('layouts.app')

@section('title', 'AI Chatbot — TechMorah Solution LTD')
@section('description', 'Ask TechMorah’s AI assistant about fintech services, delivery, and next steps — or hand off to WhatsApp and contact.')

@section('content')

<section class="tm-page-hero page-header">
    <div class="container text-center">
        <p class="tm-section-label" style="color:var(--copper-soft)">Assistant</p>
        <h1 class="tm-title" style="color:#fff;font-size:clamp(2rem,5vw,2.8rem)">AI chatbot</h1>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;color:rgba(255,255,255,0.7)">
            Quick answers about TechMorah services. For proposals and scoping, continue on WhatsApp or the contact form.
        </p>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-white-50">Home</a></li>
                <li class="breadcrumb-item active text-white" aria-current="page">AI Chatbot</li>
            </ol>
        </nav>
    </div>
</section>

<section class="tm-section">
    <div class="container">
        <div class="tm-chat-layout">
            <aside class="tm-chat-aside tm-reveal">
                <p class="tm-section-label">Suggested topics</p>
                <h2 class="h5 mb-3">Start with a prompt</h2>
                <div class="tm-chat-prompts">
                    <button type="button" class="quick-reply" data-reply="What services does TechMorah offer?">Services overview</button>
                    <button type="button" class="quick-reply" data-reply="Tell me about core banking and digital channels support">Core banking &amp; channels</button>
                    <button type="button" class="quick-reply" data-reply="How do payments and LipaPay-style integrations work?">Payments &amp; integrations</button>
                    <button type="button" class="quick-reply" data-reply="How should I contact TechMorah for a project?">Contact &amp; next steps</button>
                </div>
                <div class="tm-aside-card mt-4">
                    <p class="tm-section-label">Human handoff</p>
                    <p class="text-muted small mb-3">Need a scoped proposal? Talk to the team directly.</p>
                    <a href="https://wa.me/255655139724" target="_blank" rel="noopener" class="btn btn-secondary w-100 mb-2">WhatsApp</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-secondary w-100">Contact form</a>
                </div>
            </aside>

            <div class="tm-chat-panel tm-reveal" data-delay="1">
                <div class="chat-shell dark">
                    <div class="chat-header">
                        <div>
                            <p class="tm-section-label mb-1" style="color:var(--brand-y)">TechMorah Copilot</p>
                            <h2 class="h5 mb-0 text-white">Ask about services &amp; delivery</h2>
                        </div>
                    </div>
                    <div class="message-area" id="chatMessages">
                        <div class="text-center text-muted">
                            <p class="mb-0">Hi — ask about core banking support, channels, payments, SMS platforms, or how to engage TechMorah.</p>
                        </div>
                    </div>
                    <div class="tm-chat-footer">
                        <form id="chatForm" class="tm-chat-form" autocomplete="off">
                            @csrf
                            <input type="hidden" id="sessionId" value="session">
                            <input type="text" id="messageInput" class="flex-grow-1 chat-input" placeholder="Type your question…" required maxlength="500">
                            <button type="submit" class="btn btn-secondary">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="tm-section tm-section--navy text-center">
    <div class="container">
        <h2 class="tm-title">Prefer a human conversation?</h2>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;">WhatsApp +255 655 139 724 · techmorahsolution@gmail.com</p>
        <a href="https://wa.me/255655139724" target="_blank" rel="noopener" class="btn btn-outline-light me-2 mb-2">WhatsApp</a>
        <a href="{{ route('contact') }}" class="btn btn-light mb-2">Contact form</a>
    </div>
</section>

@endsection

@push('scripts')
<script src="{{ asset('js/chat-bot.js') }}"></script>
@endpush

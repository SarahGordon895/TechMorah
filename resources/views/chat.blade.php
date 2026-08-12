@extends('layouts.app')

@section('title', 'AI Copilot — TechMorah Solution LTD')
@section('description', 'Talk with TechMorah Copilot — an expert AI/ML advisor for digital systems, microfinance, e-commerce, ISP, payments, and implementation guidance.')

@section('content')

<section class="tm-page-hero page-header">
    <div class="container text-center">
        <p class="tm-section-label" style="color:var(--copper-soft)">TechMorah Copilot</p>
        <h1 class="tm-title" style="color:#fff;font-size:clamp(2rem,5vw,2.8rem)">AI &amp; ML expert chatbot</h1>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;color:rgba(255,255,255,0.7)">
            Practical guidance from an AI/machine-learning advisor persona — plus clear TechMorah delivery options for your next system.
        </p>
    </div>
</section>

<section class="tm-section tm-chat-section">
    <div class="container">
        <div class="tm-chat-layout">
            <aside class="tm-chat-aside tm-reveal">
                <p class="tm-section-label">Suggested prompts</p>
                <h2 class="h5 mb-3">Tap to ask</h2>
                <div class="tm-chat-prompts">
                    <button type="button" class="quick-reply" data-reply="What services does TechMorah offer?">Services overview</button>
                    <button type="button" class="quick-reply" data-reply="How should we approach an AI or machine learning project for our business?">AI / ML project approach</button>
                    <button type="button" class="quick-reply" data-reply="Compare RAG vs fine-tuning for a customer support desk">RAG vs fine-tuning</button>
                    <button type="button" class="quick-reply" data-reply="Tell me about microfinance, e-commerce, ISP and payment gateway solutions">Solution verticals</button>
                    <button type="button" class="quick-reply" data-reply="How do payments and LipaPay-style integrations work?">Payment gateways</button>
                    <button type="button" class="quick-reply" data-reply="How should I contact TechMorah for a project?">Contact &amp; next steps</button>
                </div>
                <div class="tm-aside-card mt-4">
                    <p class="tm-section-label">Human handoff</p>
                    <p class="text-muted small mb-3">Need a scoped proposal or architecture review with the team?</p>
                    <a href="https://wa.me/255655139724" target="_blank" rel="noopener" class="btn btn-secondary w-100 mb-2">WhatsApp +255 655 139 724</a>
                    <a href="{{ route('contact') }}" class="btn btn-outline-secondary w-100">Contact form</a>
                </div>
            </aside>

            <div class="tm-chat-panel tm-reveal" data-delay="1">
                <div class="chat-shell dark">
                    <div class="chat-header">
                        <div class="tm-chat-header__row">
                            <div>
                                <p class="tm-section-label mb-1" style="color:var(--brand-y)">Online · Expert mode</p>
                                <h2 class="h5 mb-0 text-white">TechMorah Copilot</h2>
                                <p class="tm-chat-header__sub mb-0">AI/ML advisor · digital systems guide</p>
                            </div>
                            <span class="tm-chat-status" aria-hidden="true"><span class="tm-chat-status__dot"></span> Ready</span>
                        </div>
                    </div>
                    <div class="message-area" id="chatMessages" aria-live="polite">
                        <div class="message-bubble bot" data-chat-welcome>
                            <p class="mb-2">Hi — I am TechMorah Copilot, an AI and machine-learning advisor with deep applied experience, here to help you think clearly about automation and digital delivery.</p>
                            <p class="mb-0">Ask about ML strategy, RAG vs fine-tuning, or TechMorah work in microfinance, e-commerce, ISP management, and payment gateways.</p>
                        </div>
                    </div>
                    <div class="tm-chat-footer">
                        <form id="chatForm" class="tm-chat-form" autocomplete="off">
                            @csrf
                            <input type="hidden" id="sessionId" value="session">
                            <label class="visually-hidden" for="messageInput">Your question</label>
                            <textarea id="messageInput" class="flex-grow-1 chat-input chat-input--area" placeholder="Ask about AI/ML, payments, ISP, e-commerce…" required maxlength="800" rows="2"></textarea>
                            <button type="submit" class="btn btn-secondary" id="chatSendBtn">Send</button>
                        </form>
                        <p class="tm-chat-hint">Enter to send · Shift+Enter for a new line · Responses are advisory; WhatsApp for formal proposals.</p>
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
<script src="{{ asset('js/chat-bot.js') }}?v=20260812i"></script>
@endpush

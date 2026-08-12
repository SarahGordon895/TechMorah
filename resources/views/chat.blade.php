@extends('layouts.app')

@section('title', 'AI Copilot — TechMorah Solution LTD')
@section('description', 'Talk with TechMorah Copilot using a service-aligned question script for web systems, microfinance, e-commerce, ISP, payments, SMS, and AI/ML guidance.')

@section('content')

<section class="tm-page-hero page-header">
    <div class="container text-center">
        <p class="tm-section-label" style="color:var(--copper-soft)">TechMorah Copilot</p>
        <h1 class="tm-title" style="color:#fff;font-size:clamp(2rem,5vw,2.8rem)">Ask about our services</h1>
        <p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;color:rgba(255,255,255,0.7)">
            Choose a question from the service script, or type your own — answers are tuned to what TechMorah actually delivers.
        </p>
    </div>
</section>

<section class="tm-section tm-chat-section">
    <div class="container">
        <div class="tm-chat-layout">
            <aside class="tm-chat-aside tm-reveal">
                <p class="tm-section-label">Question script</p>
                <h2 class="h5 mb-3">Filter by service</h2>
                <div class="tm-chat-cats" id="chatScriptCategories" aria-label="Question categories"></div>
                <div class="tm-chat-prompts" id="chatScriptPrompts">
                    <button type="button" class="quick-reply" data-reply="What services does TechMorah offer?">What services does TechMorah offer?</button>
                    <button type="button" class="quick-reply" data-reply="Can TechMorah build a microfinance or MFI system?">Can TechMorah build a microfinance or MFI system?</button>
                    <button type="button" class="quick-reply" data-reply="Can you build an online shop with cart and checkout?">Can you build an online shop with cart and checkout?</button>
                    <button type="button" class="quick-reply" data-reply="Do you build ISP management systems for fibre providers?">Do you build ISP management systems for fibre providers?</button>
                    <button type="button" class="quick-reply" data-reply="Can you integrate a payment gateway for collections and payouts?">Can you integrate a payment gateway for collections and payouts?</button>
                    <button type="button" class="quick-reply" data-reply="How should we approach an AI or machine learning project?">How should we approach an AI or machine learning project?</button>
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
                                <p class="tm-section-label mb-1" style="color:var(--brand-y)">Online · Script + AI</p>
                                <h2 class="h5 mb-0 text-white">TechMorah Copilot</h2>
                                <p class="tm-chat-header__sub mb-0">Service Q&amp;A script · AI/ML advisor</p>
                            </div>
                            <span class="tm-chat-status" aria-hidden="true"><span class="tm-chat-status__dot"></span> Ready</span>
                        </div>
                    </div>
                    <div class="message-area" id="chatMessages" aria-live="polite">
                        <div class="message-bubble bot" data-chat-welcome>
                            <p class="mb-2">Hi — tap a scripted question by service area, or type freely. I answer from TechMorah’s service playbook and AI/ML guidance.</p>
                            <p class="mb-0">Topics: web &amp; systems, microfinance, e-commerce, ISP, payments, SMS, IT support, accounting, and AI assistants.</p>
                        </div>
                    </div>
                    <div class="tm-chat-footer">
                        <form id="chatForm" class="tm-chat-form" autocomplete="off">
                            @csrf
                            <input type="hidden" id="sessionId" value="session">
                            <label class="visually-hidden" for="messageInput">Your question</label>
                            <textarea id="messageInput" class="flex-grow-1 chat-input chat-input--area" placeholder="Ask from the script or type your own question…" required maxlength="800" rows="2"></textarea>
                            <button type="submit" class="btn btn-secondary" id="chatSendBtn">Send</button>
                        </form>
                        <p class="tm-chat-hint">Enter to send · Shift+Enter for a new line · Script answers first; AI fallback for open questions.</p>
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
<script src="{{ asset('js/chat-script.js') }}?v=20260812j"></script>
<script src="{{ asset('js/chat-bot.js') }}?v=20260812j"></script>
@endpush

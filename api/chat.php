<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Accept, X-CSRF-TOKEN');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true) ?: [];
$prompt = trim((string) ($input['body'] ?? $input['message'] ?? ''));
$lower = strtolower($prompt);

function tm_handoff(): string
{
    return 'For a scoped proposal: WhatsApp +255 655 139 724 · techmorahsolution@gmail.com · Dar es Salaam Science Park.';
}

function fallback_reply(string $lower): string
{
    $persona = 'I am TechMorah Copilot — an AI/ML advisor with deep applied experience, guiding East African teams on practical automation and digital delivery.';

    if ($lower === '' ) {
        return $persona . ' Ask about AI/ML strategy or TechMorah services.';
    }
    if (str_contains($lower, 'hello') || str_contains($lower, 'hi ') || $lower === 'hi' || str_contains($lower, 'habari')) {
        return $persona . "\n\nAsk about ML strategy, RAG vs fine-tuning, or TechMorah delivery for microfinance, e-commerce, ISP, and payment gateways.";
    }
    if (str_contains($lower, 'machine learning') || str_contains($lower, 'mlops') || str_contains($lower, 'deep learning') || str_contains($lower, 'neural')) {
        return "Start with the decision to improve, then data quality, baseline metrics, then model complexity. TechMorah path: frame KPIs → audit data → baseline → model → evaluate → deploy into Laravel/React or WhatsApp workflows with monitoring.\n\nShare your use case and I will outline a fit stack.";
    }
    if (str_contains($lower, 'rag') || str_contains($lower, 'fine-tun') || str_contains($lower, 'llm') || str_contains($lower, 'gpt') || str_contains($lower, 'openai')) {
        return "RAG is usually best when knowledge changes often and must stay grounded in your documents. Fine-tuning helps tone/format on stable tasks. Many desks use RAG + tools + human escalation.\n\nTechMorah embeds assistants into web/WhatsApp with auth, logging, and handoff. " . tm_handoff();
    }
    if (str_contains($lower, 'ai') || str_contains($lower, 'nlp') || str_contains($lower, 'automation')) {
        return "Business AI works best in layers: workflow capture → RAG/tools or fine-tune → guardrails → channel embed (web/WhatsApp).\n\nTell me the channel and the job-to-be-done.";
    }
    if (str_contains($lower, 'microfinance') || str_contains($lower, 'mfi') || str_contains($lower, 'loan')) {
        return 'TechMorah builds microfinance solutions — loans, savings, members, approvals, reporting. Optional AI later: risk scoring or OCR after core workflows are solid. ' . tm_handoff();
    }
    if (str_contains($lower, 'isp') || str_contains($lower, 'fibre') || str_contains($lower, 'fiber') || str_contains($lower, 'internet')) {
        return 'TechMorah delivers ISP management — packages, subscribers, billing, support, payments. Later ML: churn, ticket classification, anomaly alerts.';
    }
    if (str_contains($lower, 'e-commerce') || str_contains($lower, 'ecommerce') || str_contains($lower, 'shop') || str_contains($lower, 'store')) {
        return 'We build e-commerce with catalogue, cart, checkout, and admin (Laravel/Filament patterns). AI add-ons after checkout reliability: search, recommendations, support bots.';
    }
    if (str_contains($lower, 'pay') || str_contains($lower, 'lipa') || str_contains($lower, 'm-pesa') || str_contains($lower, 'gateway') || str_contains($lower, 'disburs')) {
        return 'Payment gateway & integration: collections, disbursements, sandboxes, callbacks, reconciliation. Security first — signed callbacks and idempotent transactions. ' . tm_handoff();
    }
    if (str_contains($lower, 'price') || str_contains($lower, 'cost') || str_contains($lower, 'quote')) {
        return 'Pricing depends on scope and delivery model. AI/ML is quoted after data readiness and KPI clarity. ' . tm_handoff();
    }
    if (str_contains($lower, 'support') || str_contains($lower, 'hosting') || str_contains($lower, 'vps')) {
        return 'IT support, monitoring, Linux VPS/shared hosting, SSL, and handover runbooks are available. Describe your environment.';
    }
    if (str_contains($lower, 'sms') || str_contains($lower, 'whatsapp') || str_contains($lower, 'contact')) {
        return 'Enterprise SMS desks and WhatsApp routing are in scope. Reach the team on WhatsApp +255 655 139 724 or techmorahsolution@gmail.com.';
    }
    if (str_contains($lower, 'service') || str_contains($lower, 'website') || str_contains($lower, 'system') || str_contains($lower, 'design')) {
        return "TechMorah covers web & systems, UI/UX, IT support, accounting, microfinance, e-commerce, ISP management, payment gateways, and SMS.\n\nWhich area should we start with?";
    }

    return $persona . "\n\nAsk a specific question (for example: “Design a payment collections sandbox” or “Do we need RAG or fine-tuning?”).\n\n" . tm_handoff();
}

echo json_encode([
    'status' => 'ok',
    'reply' => fallback_reply($lower),
    'session_id' => $input['session_id'] ?? null,
]);

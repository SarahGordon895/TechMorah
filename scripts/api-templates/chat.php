<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

$input = json_decode(file_get_contents('php://input'), true) ?: [];
$prompt = strtolower(trim((string) ($input['body'] ?? $input['message'] ?? '')));

function fallback_reply(string $prompt): string
{
    if (str_contains($prompt, 'ai')) {
        return 'We embed AI copilots into WhatsApp, web, and voice flows. Tell me your current system and we\'ll map the rollout, or tap WhatsApp +255 655 139 724 for a live engineer.';
    }
    if (str_contains($prompt, 'price') || str_contains($prompt, 'cost')) {
        return 'Pricing is tailored per scope. Share the modules you need and I can outline options, or use our contact page for an exact quote.';
    }
    if (str_contains($prompt, 'support')) {
        return 'Our 24/7 IT support desk routes WhatsApp, FaceTime, and phone into a single timeline with proactive alerts.';
    }
    if (str_contains($prompt, 'account')) {
        return 'Computerized accounting bundles Power BI dashboards, approvals, and compliance-ready exports.';
    }
    if (str_contains($prompt, 'website') || str_contains($prompt, 'system')) {
        return 'We ship Laravel + React portals, e-commerce, and custom CRMs that inherit your brand. Describe your goal and I\'ll suggest the best TechMorah squad.';
    }
    return 'I\'m here to guide you through TechMorah Solution LTD services—AI integration, IT support, accounting automations, and web systems. Ask away or jump to WhatsApp +255 655 139 724.';
}

echo json_encode(['reply' => fallback_reply($prompt)]);

<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class PageController extends Controller
{
    public function home() { return view('home'); }
    public function about() { return view('pages.about'); }
    public function services() { return view('pages.services'); }
    public function blog() {
        $stats = [
            ['value' => '99%', 'label' => 'Client Happiness'],
            ['value' => '25+', 'label' => 'Industries Served'],
            ['value' => '120+', 'label' => 'Projects Shipped'],
            ['value' => '24/7', 'label' => 'Support Access'],
        ];

        $posts = [
            [
                'title' => 'Logistics ERP rebuild for East Africa',
                'badge' => 'Web & Systems',
                'image' => asset('images/blog-1.jpg'),
                'author' => 'Sarah Gordon',
                'date' => '24 March 2024',
                'excerpt' => 'Rebuilding a logistics ERP with Laravel + React, native Kiswahili UX flows, and automated client onboarding across devices.',
                'shares' => '824 Shares',
                'comments' => '12 Comments',
                'cta_url' => route('services'),
                'social' => [
                    ['icon' => 'fab fa-facebook-f', 'url' => 'https://www.facebook.com/share/1JnhuGhcnf/?mibextid=wwXIfr'],
                    ['icon' => 'fab fa-linkedin-in', 'url' => 'https://www.linkedin.com/in/sarah-gordon-0502b335b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app'],
                    ['icon' => 'fab fa-instagram', 'url' => 'https://www.instagram.com/techmorahsolution_ltd?igsh=MXZqZm80eXkwbjgyZQ%3D%3D&utm_source=qr'],
                ],
            ],
            [
                'title' => 'Proactive IT support with Azure OpenAI & Twilio',
                'badge' => 'IT Support',
                'image' => 'https://images.unsplash.com/photo-1677442135136-760c813263f8?auto=format&fit=crop&w=1200&q=80',
                'author' => 'Naomi Patel',
                'date' => '11 May 2024',
                'excerpt' => 'How our 24/7 support desk blends Azure OpenAI, WhatsApp routing, and Twilio Voice for proactive outage resolution.',
                'shares' => '6.3K Shares',
                'comments' => '18 Comments',
                'cta_url' => route('services') . '#support',
                'social' => [
                    ['icon' => 'fab fa-facebook-f', 'url' => 'https://www.facebook.com/share/1JnhuGhcnf/?mibextid=wwXIfr'],
                    ['icon' => 'fab fa-twitter', 'url' => 'https://twitter.com/intent/tweet?text=Learn%20about%20TechMorah%20IT%20support&url=' . urlencode(route('blog'))],
                    ['icon' => 'fab fa-instagram', 'url' => 'https://www.instagram.com/techmorahsolution_ltd?igsh=MXZqZm80eXkwbjgyZQ%3D%3D&utm_source=qr'],
                ],
            ],
            [
                'title' => 'Computerized accounting for cooperatives',
                'badge' => 'Accounting',
                'image' => 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?auto=format&fit=crop&w=1200&q=80',
                'author' => 'Moses K.',
                'date' => '02 July 2024',
                'excerpt' => 'Digitising cooperative finances with computerized accounting, Power BI dashboards, and face-matching approvals.',
                'shares' => '4.8K Shares',
                'comments' => '9 Comments',
                'cta_url' => route('services') . '#accounting',
                'social' => [
                    ['icon' => 'fab fa-facebook-f', 'url' => 'https://www.facebook.com/share/1JnhuGhcnf/?mibextid=wwXIfr'],
                    ['icon' => 'fab fa-twitter', 'url' => 'https://twitter.com/intent/tweet?text=See%20TechMorah%20accounting%20automations&url=' . urlencode(route('blog'))],
                    ['icon' => 'fab fa-instagram', 'url' => 'https://www.instagram.com/techmorahsolution_ltd?igsh=MXZqZm80eXkwbjgyZQ%3D%3D&utm_source=qr'],
                ],
            ],
        ];

        $tags = ['WebDev','SystemDesign','UIUX','ITSupport','Accounting','Automation','WhatsApp','CloudOps','AIIntegration'];

        $serviceSpotlights = [
            [
                'title' => 'Web & System Design',
                'description' => 'Custom CRMs, portals, and bilingual UX journeys engineered with Laravel, React, and secure APIs.',
                'link' => route('services'),
                'label' => 'See how we ship →',
            ],
            [
                'title' => 'Graphic & UI/UX Design',
                'description' => 'Brand systems, dashboards, and design systems crafted for smooth handoff to engineering.',
                'link' => route('services') . '#uiux',
                'label' => 'Explore design ops →',
            ],
            [
                'title' => 'IT Support & Accounting',
                'description' => 'Always-on support paired with computerized accounting automations tuned for African finance teams.',
                'link' => route('contact'),
                'label' => 'Schedule a consult →',
            ],
            [
                'title' => 'AI Integration & Automation',
                'description' => 'Embed OpenAI copilots, WhatsApp bots, and voice agents into your workflow without breaking existing systems.',
                'link' => route('services') . '#ai',
                'label' => 'Plan an AI rollout →',
            ],
        ];

        $solutionStories = [
            [
                'client' => 'Prime Tech Lab TZ',
                'industry' => 'IT Support & Software',
                'image' => 'https://images.unsplash.com/photo-1545239351-1141bd82e8a6?auto=format&fit=crop&w=1000&q=80',
                'challenge' => 'Needed a unified ticketing + WhatsApp routing hub for maintenance clients spread across Dar es Salaam.',
                'solution' => 'Deployed a Laravel + Twilio desk that syncs FaceTime, WhatsApp, and phone triage with live AI summaries.',
                'outcome' => 'Average response time dropped from 3h to 25m while maintaining full audit logs for every engineer visit.',
                'services' => ['IT Support', 'Automation', 'Web Systems'],
                'cta_url' => route('contact'),
            ],
            [
                'client' => 'UDSM Cafe',
                'industry' => 'Hospitality',
                'image' => 'https://images.unsplash.com/photo-1482049016688-2d3e1b311543?auto=format&fit=crop&w=1000&q=80',
                'challenge' => 'Wanted mobile ordering, reservation slots, and campus payments without clogging the counter line.',
                'solution' => 'Rolled out a responsive PWA with menu CMS, Mpesa integration, and kitchen display powered by Laravel + Vue.',
                'outcome' => 'Reduced wait lines by 60% and opened a pre-order lane for faculty events within the first month.',
                'services' => ['Web Apps', 'UI/UX Design', 'Payments'],
                'cta_url' => route('services'),
            ],
            [
                'client' => 'Prime Interior Studio',
                'industry' => 'Interior & Fit-out',
                'image' => asset('images/prime-interior.svg'),
                'challenge' => 'Needed a responsive portfolio CMS that keeps residential, ecommerce, and office case studies synced with the main system flow.',
                'solution' => 'Delivered a Laravel-powered gallery hub with drag-and-drop case studies, AI image compression, and dynamic sections that inherit the global layout + responsiveness.',
                'outcome' => 'Prospects now browse curated looks seamlessly on any device, and qualified bookings tripled once the flow matched the rest of TechMorah’s experience.',
                'services' => ['Web Design', 'System Design', 'AI Integration'],
                'cta_url' => route('services') . '#uiux',
            ],
            [
                'client' => 'Lib-System University',
                'industry' => 'Education',
                'image' => 'https://images.unsplash.com/photo-1457694587812-e8bf29a43845?auto=format&fit=crop&w=1000&q=80',
                'challenge' => 'Manual book lending caused lost records across 8 departments and zero analytics.',
                'solution' => 'Delivered a multi-tenant library dashboard with biometrics-ready logins, borrowing analytics, and SMS reminders.',
                'outcome' => 'Borrow/return accuracy hit 99% and staff now triage requests from any device via secure dashboards.',
                'services' => ['System Development', 'Data & Analytics', 'IT Support'],
                'cta_url' => route('services') . '#support',
            ],
        ];

        return view('blog', compact('stats', 'posts', 'tags', 'serviceSpotlights', 'solutionStories'));
    }
    // Return the top-level contacts view (resources/views/contacts.blade.php)
    // The project currently places the contact template at resources/views/contacts.blade.php
    // so return that instead of the non-existent 'pages.contact' view.
    public function contact() { return view('contacts'); }
    public function products() {
        $products = Product::latest()->get();
        return view('pages.products', compact('products'));
    }
}

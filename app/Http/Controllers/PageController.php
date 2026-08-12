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
            ['value' => '4+', 'label' => 'Years leadership'],
            ['value' => '10+', 'label' => 'Relationships'],
            ['value' => '25+', 'label' => 'Platforms'],
            ['value' => '10', 'label' => 'Service lines'],
        ];

        $portfolio = 'https://sarahgordon895.github.io/sarahgordon.github.io/';

        $solutionStories = [
            [
                'client' => 'Victoria Lush Limited',
                'industry' => 'Enterprise SMS',
                'image' => asset('img/case-studies/vll-admin.jpg'),
                'challenge' => 'Needed a company portal, unified admin, customer-facing SMS app, and reliable production hosting.',
                'solution' => 'Built VLL Admin, VLL SMS company portal, and SmSver1 stack — deployed on Linux VPS with SSL and handover docs.',
                'outcome' => 'Live enterprise SMS operations: portals, reseller workflows, and production dashboards.',
                'services' => ['Laravel', 'Company portal', 'Linux VPS', 'SMS APIs'],
                'cta_url' => route('contact'),
                'portfolio_url' => $portfolio,
            ],
            [
                'client' => 'iMartGroup — LipaPay',
                'industry' => 'FinTech / payments',
                'image' => asset('img/case-studies/lipapay-sandbox.jpg'),
                'challenge' => 'Required collections, airtime, disbursement, and a developer sandbox before production mobile-money flows.',
                'solution' => 'Delivered LipaPay surfaces plus Sandbox_LipaPay on shared hosting with API reference and staging.',
                'outcome' => 'Teams validate and operate payment flows with clear handover and hosting runbooks.',
                'services' => ['REST APIs', 'Shared hosting', 'Sandbox', 'Laravel'],
                'cta_url' => route('services') . '#payments',
                'portfolio_url' => $portfolio,
            ],
            [
                'client' => 'Active Targets',
                'industry' => 'E-commerce',
                'image' => asset('img/carousel-1.jpg'),
                'challenge' => 'Needed a production storefront and admin for Tanzania-made AR500 targets.',
                'solution' => 'Shipped Laravel + Filament e-commerce — shop, cart, checkout, CMS, and hardened production deploy.',
                'outcome' => 'Live commerce channel with admin ops and security hardening.',
                'services' => ['Laravel', 'Filament', 'E-commerce', 'Checkout'],
                'cta_url' => route('services') . '#ecommerce',
                'portfolio_url' => $portfolio,
            ],
            [
                'client' => 'Savanna Fibre',
                'industry' => 'ISP / digital',
                'image' => asset('img/blog-1.jpg'),
                'challenge' => 'Needed package presentation, coverage enquiry, lead capture, and support journeys.',
                'solution' => 'Built a marketing and conversion site with residential/business packages and lead forms.',
                'outcome' => 'Clear digital front door for ISP acquisition and support routing.',
                'services' => ['Web', 'Lead forms', 'UX'],
                'cta_url' => route('services') . '#web',
                'portfolio_url' => $portfolio,
            ],
            [
                'client' => 'iMartGroup — ELMS',
                'industry' => 'HR / operations',
                'image' => asset('img/blog-2.jpg'),
                'challenge' => 'Needed employee leave applications, approvals, balances, and reporting in one portal.',
                'solution' => 'Delivered Laravel leave management with employee and administrator portals.',
                'outcome' => 'Production HR workflow used by iMartGroup teams.',
                'services' => ['Laravel', 'HR workflow', 'Blade'],
                'cta_url' => route('services') . '#enterprise',
                'portfolio_url' => $portfolio,
            ],
            [
                'client' => 'Fee Tracking & Reminder',
                'industry' => 'Education',
                'image' => asset('img/blog-3.jpg'),
                'challenge' => 'School staff needed fee records, receipts, and parent reminders without spreadsheet chaos.',
                'solution' => 'Delivered a Laravel staff portal for payments, receipts, and reminder workflows.',
                'outcome' => 'Clearer fee visibility and parent communication for Mbonea Secondary School.',
                'services' => ['Laravel', 'Receipts', 'Reminders'],
                'cta_url' => route('services') . '#enterprise',
                'portfolio_url' => $portfolio,
            ],
        ];

        return view('blog', compact('stats', 'solutionStories'));
    }

    public function contact() { return view('contacts'); }

    public function products() {
        $products = Product::latest()->get();
        return view('pages.products', compact('products'));
    }
}

<?php
namespace App\Http\Controllers;
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
            ['value' => '14', 'label' => 'Featured builds'],
        ];

        $portfolio = 'https://sarahgordon895.github.io/sarahgordon.github.io/';
        $img = fn (string $file) => asset('img/case-studies/' . $file);

        $solutionStories = [
            [
                'client' => 'Active Targets — e-commerce',
                'industry' => 'Live · E-commerce',
                'image' => $img('active-targets.jpg'),
                'challenge' => 'Needed a production storefront and admin for Tanzania-made AR500 targets — catalog, cart, coupons, CMS, and orders.',
                'solution' => 'Shipped Laravel + Filament e-commerce: shop, checkout, admin CMS, and hardened Namecheap production deploy with performance and security hardening.',
                'outcome' => 'Live commerce channel at activetargets.org with admin ops ready for daily sales.',
                'services' => ['Laravel', 'Filament', 'E-commerce', 'Checkout'],
                'cta_url' => route('services') . '#ecommerce',
                'portfolio_url' => $portfolio,
                'live_url' => 'https://activetargets.org/',
            ],
            [
                'client' => 'imartListener — Android desk app',
                'industry' => 'Live · Flutter / SMS desk',
                'image' => $img('imart-listener-login.jpg'),
                'challenge' => 'iMart Group needed an on-device desk to capture customer SMS and WhatsApp, then sync conversations for agent replies.',
                'solution' => 'Launched Flutter Android Listener with inbox sync to API, reply templates/bulk, and social phone lookup — paired with imartPortal + Laravel listenerBackend.',
                'outcome' => 'Production business desk app feeding the live portal workflow (same account as the web desk).',
                'services' => ['Flutter', 'SMS/WhatsApp', 'Laravel API'],
                'cta_url' => route('services') . '#channels',
                'portfolio_url' => $portfolio,
                'live_url' => 'https://imartlistener.lipapay.co.tz/',
            ],
            [
                'client' => 'imartPortal — business message desk',
                'industry' => 'Live · Portal (logged in)',
                'image' => $img('imart-listener-portal.jpg'),
                'challenge' => 'Agents needed a secure web desk for conversations, outgoing messages, templates, sender IDs, and SMS settings alongside the Listener phone app.',
                'solution' => 'Delivered imartPortal — Dashboard, Conversations, Outgoing, Templates, Social lookups, Incoming log, Sender ID, and SMS settings for the client workspace.',
                'outcome' => 'Logged-in business message desk live at imartlistener.lipapay.co.tz, paired with the Android Listener app.',
                'services' => ['PHP', 'MySQL', 'SMS ops', 'Portal'],
                'cta_url' => route('contact'),
                'portfolio_url' => $portfolio,
                'live_url' => 'https://imartlistener.lipapay.co.tz/',
            ],
            [
                'client' => 'iMart SMS Portal',
                'industry' => 'Live · Enterprise SMS',
                'image' => $img('imart-listener-app-landing.jpg'),
                'challenge' => 'Operations needed a clear entry point to sign in to the portal and download the Android Listener for the phone that receives customer messages.',
                'solution' => 'Shipped the imartPortal landing experience — Sign in, Open portal, and Download Android app — with shared portal credentials for web and mobile.',
                'outcome' => 'Unified onboarding path for desk agents: web portal + Listener app from one branded flow.',
                'services' => ['Portal UX', 'Android handoff', 'SMS ops'],
                'cta_url' => route('contact'),
                'portfolio_url' => $portfolio,
                'live_url' => 'https://imartlistener.lipapay.co.tz/',
            ],
            [
                'client' => 'LipaPay Portal — collections',
                'industry' => 'Live · FinTech / payments',
                'image' => $img('lipapay-portal.jpg'),
                'challenge' => 'Merchants needed a collections portal covering MNO, bank, USSD, and card flows with secure checkout.',
                'solution' => 'Built LipaPay Ver2 portal with API integration, secure checkout, and production support for iMartGroup payment operations.',
                'outcome' => 'Live collections channel at portal.lipapay.co.tz.',
                'services' => ['Laravel', 'Payments API', 'MNO/Bank'],
                'cta_url' => route('services') . '#payments',
                'portfolio_url' => $portfolio,
                'live_url' => 'https://portal.lipapay.co.tz/',
            ],
            [
                'client' => 'Lipa Airtime',
                'industry' => 'Live · FinTech / airtime',
                'image' => $img('lipa-airtime.jpg'),
                'challenge' => 'Needed wallet purchase, bulk Excel top-ups, and role-based dashboards for merchants and finance.',
                'solution' => 'Launched Laravel airtime platform with recharge callbacks and merchant/finance dashboards.',
                'outcome' => 'Live airtime operations at airtime.lipapay.co.tz.',
                'services' => ['Laravel', 'Airtime API', 'Callbacks'],
                'cta_url' => route('services') . '#payments',
                'portfolio_url' => $portfolio,
                'live_url' => 'https://airtime.lipapay.co.tz/',
            ],
            [
                'client' => 'Lipa Disbursement',
                'industry' => 'Live · FinTech / payouts',
                'image' => $img('lipa-disbursement.jpg'),
                'challenge' => 'Required outbound mobile-wallet and bank payouts with status polling and merchant reconciliation.',
                'solution' => 'Delivered Laravel disbursement engine with callbacks, polling, and reconciliation-aware payout flows.',
                'outcome' => 'Live payout operations at disbursement.lipapay.co.tz.',
                'services' => ['Laravel', 'Disbursement', 'APIs'],
                'cta_url' => route('services') . '#payments',
                'portfolio_url' => $portfolio,
                'live_url' => 'https://disbursement.lipapay.co.tz/',
            ],
            [
                'client' => 'LipaPay sandbox — iMartGroup',
                'industry' => 'Hosted sandbox · Logged-in workspace',
                'image' => $img('lipapay-sandbox.jpg'),
                'challenge' => 'Developers needed a staging hub and authenticated merchant workspace before mobile-money flows went to production.',
                'solution' => 'Built Sandbox_LipaPay in iMartGroup Projects — developer docs hub plus logged-in merchant workspace (Testing Lab, Live APIs, Keys, Environments, Webhooks).',
                'outcome' => 'Teams browse sandbox docs and sign in to the merchant workspace at sandbox.lipapay.co.tz before go-live.',
                'services' => ['Laravel', 'REST APIs', 'Shared hosting', 'Sandbox'],
                'cta_url' => route('services') . '#payments',
                'portfolio_url' => $portfolio,
                'live_url' => 'https://sandbox.lipapay.co.tz/',
            ],
            [
                'client' => 'VLL Admin — Victoria Lush',
                'industry' => 'Live · Enterprise SMS',
                'image' => $img('vll-admin.jpg'),
                'challenge' => 'Needed central admin for users, SMS operations, and platform configuration on a reliable production host.',
                'solution' => 'Built VLL Admin (Laravel) as part of the Victoria Lush stack deployed on Linux VPS with SSL and handover runbooks.',
                'outcome' => 'Production admin used for daily SMS platform configuration and operations.',
                'services' => ['Laravel', 'MySQL', 'Blade', 'Linux VPS'],
                'cta_url' => route('contact'),
                'portfolio_url' => $portfolio,
            ],
            [
                'client' => 'VLL SMS — company portal',
                'industry' => 'Live · Company portal',
                'image' => $img('vll-sms.jpg'),
                'challenge' => 'Customers and operators needed a portal for SMS campaigns, contacts, templates, and delivery history.',
                'solution' => 'Delivered the Victoria Lush company portal (VLL SMS) on production Linux VPS with documented environment config.',
                'outcome' => 'Live customer-facing SMS portal supporting campaigns and delivery tracking.',
                'services' => ['Laravel', 'Company portal', 'Linux VPS'],
                'cta_url' => route('contact'),
                'portfolio_url' => $portfolio,
            ],
            [
                'client' => 'SMS Ver 1 — administrator',
                'industry' => 'Live · SMS ecosystem',
                'image' => $img('smsver1-admin.jpg'),
                'challenge' => 'Legacy SMS operations needed agent, reseller, pricing, and credit allocation controls.',
                'solution' => 'Maintained and operated the SmSver1 administrator console (PHP/MySQL/SMPP) within the Victoria Lush SMS ecosystem.',
                'outcome' => 'Reseller and credit workflows continue to run for production SMS operations.',
                'services' => ['PHP', 'MySQL', 'SMPP'],
                'cta_url' => route('contact'),
                'portfolio_url' => $portfolio,
            ],
            [
                'client' => 'Savanna Fibre — ISP digital',
                'industry' => 'Live · ISP / web',
                'image' => $img('savanna-fibre.jpg'),
                'challenge' => 'Fibre customers needed clear packages, coverage enquiry, shops, lead capture, and support journeys.',
                'solution' => 'Built the marketing and conversion site with residential/business packages, coverage, and lead forms.',
                'outcome' => 'Live acquisition front door at savannafibre.co.tz.',
                'services' => ['HTML/CSS/JS', 'ISP UX', 'Lead forms'],
                'cta_url' => route('services') . '#web',
                'portfolio_url' => $portfolio,
                'live_url' => 'https://www.savannafibre.co.tz/',
            ],
            [
                'client' => 'iMartGroup Leave System (ELMS)',
                'industry' => 'Live · HR / operations',
                'image' => $img('elsm-live.jpg'),
                'challenge' => 'Employees and admins needed leave applications, balances, approvals, and reporting in one secure system.',
                'solution' => 'Delivered Laravel ELMS with employee and administrator portals, approvals, and reporting.',
                'outcome' => 'Production leave workflow at leave.imartgroup.co.tz.',
                'services' => ['Laravel', 'Blade', 'HR workflow'],
                'cta_url' => route('services') . '#enterprise',
                'portfolio_url' => $portfolio,
                'live_url' => 'https://leave.imartgroup.co.tz/',
            ],
            [
                'client' => 'Fee Tracking & Reminder (FTRS)',
                'industry' => 'Delivered · Education',
                'image' => $img('fee-tracking.jpg'),
                'challenge' => 'Mbonea Secondary School staff needed fee records, receipts, and parent reminders without spreadsheet chaos.',
                'solution' => 'Built a Laravel staff portal to track fees, record payments, issue receipts, and send parent reminders.',
                'outcome' => 'Clearer fee visibility and parent communication from one secure system.',
                'services' => ['Laravel', 'Receipts', 'Reminders'],
                'cta_url' => route('services') . '#enterprise',
                'portfolio_url' => $portfolio,
            ],
            [
                'client' => 'CakeZone — bakery admin',
                'industry' => 'Demo · Operations software',
                'image' => $img('cakezone.jpg'),
                'challenge' => 'Needed shop management for cakes and orders — catalog, customers, and an admin panel.',
                'solution' => 'Built Laravel + Filament bakery admin for catalog, customers, and order workflows.',
                'outcome' => 'Demonstrates Filament admin patterns reusable for retail and SMB operations systems.',
                'services' => ['Laravel', 'Filament', 'MySQL'],
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

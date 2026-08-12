/** Data mirrored from PageController + fintech service catalogue */
export const serviceStats = [
  { value: "4+", label: "Years leadership" },
  { value: "10+", label: "Relationships" },
  { value: "25+", label: "Platforms" },
  { value: "10", label: "Service lines" },
];

export const services = [
  {
    id: "core-banking",
    icon: "fas fa-university",
    title: "Microfinance & Core Banking",
    copy: "Module configuration, loan/savings workflows, GL mapping review, and EOD batch troubleshooting within authorised platform scope.",
    cta: "#consult",
  },
  {
    id: "channels",
    icon: "fas fa-mobile-alt",
    title: "Digital Banking Channels",
    copy: "Internet Banking, Flutter mobile, agency POS, USSD, and merchant journeys with OTP and REST/Swagger integration.",
    cta: "#consult",
  },
  {
    id: "payments",
    icon: "fas fa-credit-card",
    title: "Integrations & Payments",
    copy: "Mobile money gateways, developer sandboxes, callbacks, and reconciliation-aware collection/disbursement flows.",
    cta: "#consult",
  },
  {
    id: "ecommerce",
    icon: "fas fa-shopping-cart",
    title: "E-Commerce Solutions",
    copy: "Storefronts, inventory, cart, checkout, and payment gateways for direct digital sales channels.",
    cta: "#consult",
  },
  {
    id: "enterprise",
    icon: "fas fa-laptop-code",
    title: "Custom Enterprise Software",
    copy: "Tailored web/mobile workflows, approval chains, HR platforms, and business portals on Laravel + React.",
    cta: "#consult",
  },
  {
    id: "web",
    icon: "fas fa-globe",
    title: "Web & Portal Design",
    copy: "Corporate web applications, customer portals, administrative dashboards, and intranets.",
    cta: "#consult",
  },
  {
    id: "ai",
    icon: "fas fa-robot",
    title: "AI Integration & Automation",
    copy: "Enterprise knowledge assistants, document classification, and support routing workflows.",
    cta: "#consult",
  },
  {
    id: "support",
    icon: "fas fa-headset",
    title: "IT Support & NOC",
    copy: "Monitoring, database performance tuning, remote support, and incident management for high availability.",
    cta: "#consult",
  },
  {
    id: "uiux",
    icon: "fas fa-palette",
    title: "Graphic Design & UI/UX",
    copy: "Wireframing, prototypes, design systems, visual branding, and accessible digital assets.",
    cta: "about.html",
  },
  {
    id: "hosting",
    icon: "fas fa-server",
    title: "Hosting & Infrastructure",
    copy: "Linux VPS, IIS, SSL, DNS, and backup routines — proven on Victoria Lush and iMartGroup LipaPay deployments.",
    cta: "#consult",
  },
];

export const approachSteps = [
  { title: "Discover & align", copy: "Workshops to map workflows, compliance, and success metrics before build starts." },
  { title: "Design the experience", copy: "Wireframes, UI systems, and branded assets as the single source of truth." },
  { title: "Build & integrate", copy: "Laravel, React, REST APIs, SMS/WhatsApp/payment hooks tested on real workflows." },
  { title: "Launch & support", copy: "VPS or shared hosting, training, runbooks, and production iteration." },
];

export const blogStats = [
  { value: "4+", label: "Years leadership" },
  { value: "Fintech", label: "Channels & payments" },
  { value: "25+", label: "Platforms" },
  { value: "24/7", label: "Support access" },
];

export const blogTags = [
  "WebDev",
  "SystemDesign",
  "UIUX",
  "ITSupport",
  "Accounting",
  "Automation",
  "WhatsApp",
  "CloudOps",
  "AIIntegration",
];

export const serviceSpotlights = [
  {
    title: "Web & System Design",
    description: "Custom CRMs, portals, and bilingual UX journeys engineered with Laravel, React, and secure APIs.",
    link: "services.html",
    label: "See how we ship →",
  },
  {
    title: "Graphic & UI/UX Design",
    description: "Brand systems, dashboards, and design systems crafted for smooth handoff to engineering.",
    link: "services.html#uiux",
    label: "Explore design ops →",
  },
  {
    title: "IT Support & Accounting",
    description: "Always-on support paired with computerized accounting automations tuned for African finance teams.",
    link: "contact.html",
    label: "Schedule a consult →",
  },
  {
    title: "AI Integration & Automation",
    description: "Embed OpenAI copilots, WhatsApp bots, and voice agents into your workflow without breaking existing systems.",
    link: "services.html#ai",
    label: "Plan an AI rollout →",
  },
];

export const solutionStories = [
  {
    client: "Victoria Lush Limited",
    industry: "Enterprise SMS",
    image: "img/case-studies/vll-admin.jpg",
    featured: true,
    challenge: "Needed a company portal, unified admin, customer-facing SMS app, and reliable production hosting for daily operations.",
    solution: "Built VLL Admin, the Victoria Lush company portal (VLL SMS), and SmSver1 integrations — deployed and maintained on a Linux VPS with SSL and handover documentation.",
    outcome: "Live enterprise SMS stack on VPS: portals, reseller workflows, and operations dashboards used in production.",
    services: ["Laravel", "Company portal", "Linux VPS", "SMS APIs"],
    cta_url: "contact.html",
    portfolio_url: "https://sarahgordon895.github.io/sarahgordon.github.io/",
  },
  {
    client: "iMartGroup — LipaPay",
    industry: "FinTech / payments",
    image: "img/case-studies/lipapay-sandbox.jpg",
    featured: true,
    challenge: "Required merchant collections, airtime, disbursement, and a developer sandbox before mobile-money flows went to production.",
    solution: "Delivered LipaPay portal / airtime / disbursement surfaces plus Sandbox_LipaPay on shared hosting with API reference and staging.",
    outcome: "Teams validate and operate payment flows with clear handover and hosting runbooks.",
    services: ["REST APIs", "Shared hosting", "Sandbox", "Laravel"],
    cta_url: "services.html#payments",
    portfolio_url: "https://sarahgordon895.github.io/sarahgordon.github.io/",
  },
  {
    client: "Active Targets",
    industry: "E-commerce",
    image: "img/carousel-1.jpg",
    featured: true,
    challenge: "Needed a production storefront and admin for Tanzania-made AR500 targets with carts, coupons, and CMS.",
    solution: "Shipped Laravel + Filament e-commerce — shop, cart, checkout, orders, and hardened Namecheap production deploy.",
    outcome: "Live commerce channel with admin ops and performance/security hardening.",
    services: ["Laravel", "Filament", "E-commerce", "Checkout"],
    cta_url: "services.html#ecommerce",
    portfolio_url: "https://sarahgordon895.github.io/sarahgordon.github.io/",
  },
  {
    client: "Savanna Fibre",
    industry: "ISP / digital",
    image: "img/blog-1.jpg",
    challenge: "Needed package presentation, coverage enquiry, lead capture, and support journeys for fibre customers.",
    solution: "Built a marketing and conversion site with residential/business packages, shops, and lead forms.",
    outcome: "Clear digital front door for ISP acquisition and support routing.",
    services: ["Web", "Lead forms", "UX"],
    cta_url: "services.html#web",
    portfolio_url: "https://sarahgordon895.github.io/sarahgordon.github.io/",
  },
  {
    client: "iMartGroup — ELMS",
    industry: "HR / operations",
    image: "img/blog-2.jpg",
    challenge: "Needed employee leave applications, approvals, balances, and reporting in one secure portal.",
    solution: "Delivered Laravel leave management with employee and administrator portals.",
    outcome: "Production HR workflow used by iMartGroup teams.",
    services: ["Laravel", "HR workflow", "Blade"],
    cta_url: "services.html#enterprise",
    portfolio_url: "https://sarahgordon895.github.io/sarahgordon.github.io/",
  },
  {
    client: "Fee Tracking & Reminder",
    industry: "Education",
    image: "img/blog-3.jpg",
    challenge: "School staff needed fee records, receipts, and parent reminders without spreadsheet chaos.",
    solution: "Delivered a Laravel staff portal for payments, receipts, and reminder workflows.",
    outcome: "Clearer fee visibility and parent communication for Mbonea Secondary School.",
    services: ["Laravel", "Receipts", "Reminders"],
    cta_url: "services.html#enterprise",
    portfolio_url: "https://sarahgordon895.github.io/sarahgordon.github.io/",
  },
];

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
    challenge: "Required a developer sandbox, API reference, and hosted staging before mobile-money flows went to production.",
    solution: "Built Sandbox_LipaPay and deployed on shared hosting — API docs, integration testing, and web hosting aligned with enterprise delivery practices.",
    outcome: "Teams validated payment flows on a live hosted sandbox with clear handover, review culture, and hosting runbooks.",
    services: ["REST APIs", "Shared hosting", "Sandbox", "Laravel"],
    cta_url: "services.html#integrations",
    portfolio_url: "https://github.com/SarahGordon895/Sandbox_LipaPay",
  },
  {
    client: "Prime Tech Lab TZ",
    industry: "IT Support & Software",
    image: "https://images.unsplash.com/photo-1545239351-1141bd82e8a6?auto=format&fit=crop&w=1000&q=80",
    challenge: "Needed a unified ticketing + WhatsApp routing hub for maintenance clients spread across Dar es Salaam.",
    solution: "Deployed a Laravel + Twilio desk that syncs FaceTime, WhatsApp, and phone triage with live AI summaries.",
    outcome: "Average response time dropped from 3h to 25m while maintaining full audit logs for every engineer visit.",
    services: ["IT Support", "Automation", "Web Systems"],
    cta_url: "contact.html",
  },
  {
    client: "UDSM Cafe",
    industry: "Hospitality",
    image: "https://images.unsplash.com/photo-1482049016688-2d3e1b311543?auto=format&fit=crop&w=1000&q=80",
    challenge: "Wanted mobile ordering, reservation slots, and campus payments without clogging the counter line.",
    solution: "Rolled out a responsive PWA with menu CMS, Mpesa integration, and kitchen display powered by Laravel + Vue.",
    outcome: "Reduced wait lines by 60% and opened a pre-order lane for faculty events within the first month.",
    services: ["Web Apps", "UI/UX Design", "Payments"],
    cta_url: "services.html",
  },
  {
    client: "Prime Interior Studio",
    industry: "Interior & Fit-out",
    image: "images/prime-interior.svg",
    challenge: "Needed a responsive portfolio CMS that keeps residential, ecommerce, and office case studies synced with the main system flow.",
    solution: "Delivered a Laravel-powered gallery hub with drag-and-drop case studies, AI image compression, and dynamic sections that inherit the global layout + responsiveness.",
    outcome: "Prospects now browse curated looks seamlessly on any device, and qualified bookings tripled once the flow matched the rest of TechMorah's experience.",
    services: ["Web Design", "System Design", "AI Integration"],
    cta_url: "services.html#uiux",
  },
  {
    client: "Lib-System University",
    industry: "Education",
    image: "https://images.unsplash.com/photo-1457694587812-e8bf29a43845?auto=format&fit=crop&w=1000&q=80",
    challenge: "Manual book lending caused lost records across 8 departments and zero analytics.",
    solution: "Delivered a multi-tenant library dashboard with biometrics-ready logins, borrowing analytics, and SMS reminders.",
    outcome: "Borrow/return accuracy hit 99% and staff now triage requests from any device via secure dashboards.",
    services: ["System Development", "Data & Analytics", "IT Support"],
    cta_url: "services.html#support",
  },
];

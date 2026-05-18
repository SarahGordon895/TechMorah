/** Data mirrored from PageController + pages/services.blade.php */
export const serviceStats = [
  { value: "2+", label: "Years production delivery" },
  { value: "Enterprise", label: "SMS & payments" },
  { value: "24/7", label: "Support-ready" },
  { value: "Laravel", label: "Full-stack core" },
];

export const services = [
  {
    id: "web",
    icon: "fas fa-laptop-code",
    title: "Web & System Design",
    copy: "Laravel + React portals, intranets, and CRMs tuned for local compliance, multi-currency billing, and offline-first access.",
    cta: "#consult",
  },
  {
    id: "integrations",
    icon: "fas fa-project-diagram",
    title: "Custom Integrations",
    copy: "API bridges for ERPs, mobile money, and WhatsApp so data flows across departments without breaking legacy tools.",
    cta: "#consult",
  },
  {
    id: "ai",
    icon: "fas fa-robot",
    title: "AI Integration & Automation",
    copy: "OpenAI, Groq, and WhatsApp bots that summarize tickets, escalate to humans, and keep transcripts synced across channels.",
    cta: "#consult",
  },
  {
    id: "support",
    icon: "fas fa-headset",
    title: "IT Support & NOC",
    copy: "Proactive monitoring, FaceTime walkthroughs, and on-site dispatch supported by Azure + Twilio alerts 24/7.",
    cta: "#consult",
  },
  {
    id: "uiux",
    icon: "fas fa-palette",
    title: "Graphic & UI/UX Design",
    copy: "Design systems, dashboards, and storytelling assets that hand off cleanly to engineering and marketing squads.",
    cta: "about.html",
  },
  {
    id: "accounting",
    icon: "fas fa-calculator",
    title: "Computerized Accounting",
    copy: "Finance dashboards with Power BI, automated approvals, and audit-ready exports for cooperatives and SMEs.",
    cta: "#consult",
  },
];

export const approachSteps = [
  { title: "Discover & co-design", copy: "Workshops to map current workflows, languages, and compliance requirements." },
  { title: "Build & integrate", copy: "Sprints with shared demos, AI-assisted QA, and handoffs synced with your ops calendar." },
  { title: "Launch & support", copy: "Playbooks for training, WhatsApp escalation trees, and analytics dashboards out of the box." },
];

export const blogStats = [
  { value: "2+", label: "Years delivery" },
  { value: "Enterprise", label: "SMS & payments" },
  { value: "Laravel", label: "Full-stack" },
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
    image: "https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=1000&q=80",
    challenge: "Needed a unified admin, customer portal, and legacy SmSver1 stack for bulk messaging, resellers, and operations.",
    solution: "Delivered VLL Admin (Laravel), VLL SMS customer portal, and API integrations — ongoing full-stack ownership.",
    outcome: "Production SMS platform with admin consoles, reseller workflows, and operational dashboards in daily use.",
    services: ["Laravel", "SMS APIs", "System Design"],
    cta_url: "contact.html",
  },
  {
    client: "iMartGroup — LipaPay",
    industry: "FinTech / payments",
    image: "https://images.unsplash.com/photo-1563986768608-018a0e3b6f0b?auto=format&fit=crop&w=1000&q=80",
    challenge: "Required a developer sandbox and API reference before mobile-money flows went to production.",
    solution: "Built Sandbox_LipaPay — staging environment, API docs, and integration testing aligned with enterprise delivery practices.",
    outcome: "Teams could validate payment flows safely before go-live, with clear handover and review culture.",
    services: ["REST APIs", "Sandbox", "Laravel"],
    cta_url: "services.html#integrations",
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

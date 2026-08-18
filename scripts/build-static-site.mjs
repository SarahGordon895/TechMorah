/**
 * Build static HTML site in docs/ from Laravel Blade views.
 * Run: node scripts/build-static-site.mjs
 */
import fs from "fs/promises";
import path from "path";
import { fileURLToPath } from "url";
import {
  serviceStats,
  services,
  approachSteps,
  blogStats,
  blogTags,
  serviceSpotlights,
  solutionStories,
} from "./static-data.mjs";
import { productNav, solutionsNav, companyUrl, portfolioUrl } from "./company-content.mjs";

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const root = path.resolve(__dirname, "..");
const args = process.argv.slice(2);
const standalone = args.includes("--standalone");
const outArg = args.find((a) => a.startsWith("--out="));
const docs = outArg
  ? path.resolve(outArg.split("=")[1])
  : standalone
    ? path.resolve(root, "../../TechMorah-site")
    : path.join(root, "docs");
const includePhp = !standalone && !args.includes("--no-php");
/** Optional custom domain. Pass --domain=example.com only AFTER the domain is purchased + DNS is set. */
const domainArg = args.find((a) => a.startsWith("--domain="));
const customDomain = domainArg ? domainArg.slice("--domain=".length).trim().toLowerCase() : "";
/**
 * Asset prefix for GitHub project Pages: /TechMorah
 * Use --base= (empty) together with --domain=... after custom domain DNS works.
 */
const baseArg = args.find((a) => a.startsWith("--base="));
const sitePrefix = baseArg
  ? baseArg.slice("--base=".length).replace(/\/$/, "")
  : "";

function asset(p) {
  if (!p || /^https?:/i.test(p) || p.startsWith("data:")) return p;
  const clean = p.replace(/^\//, "");
  return sitePrefix ? `${sitePrefix}/${clean}` : clean;
}

function applyAssetPaths(html) {
  if (!sitePrefix) return html;
  return html
    .replace(/\bhref="(?!https?:|#|tel:|mailto:|javascript:)([^"]+)"/gi, (_, p) => {
      if (p.startsWith(sitePrefix)) return `href="${p}"`;
      return `href="${asset(p)}"`;
    })
    .replace(/\bsrc="(?!https?:|data:)([^"]+)"/gi, (_, p) => {
      if (p.startsWith(sitePrefix)) return `src="${p}"`;
      return `src="${asset(p)}"`;
    });
}

const views = path.join(root, "resources", "views");
const publicDir = path.join(root, "public");
const apiTpl = path.join(__dirname, "api-templates");

function brandSm() {
  return `<span class="brand-mark brand-mark--sm brand-mark--align-text"><span class="brand-mark__icon-slot"><img src="${asset("img/techmorah-icon.png")}" alt="TechMorah Solution LTD" class="brand-mark__logo-img" loading="lazy" decoding="async"></span><span class="visually-hidden">TechMorah Solution LTD</span></span>`;
}
function brandLg(className = "text-white") {
  return `<span class="brand-mark brand-mark--lg ${className}"><span class="brand-mark__icon-slot"><img src="${asset("img/techmorah-icon.png")}" alt="TechMorah Solution LTD" class="brand-mark__logo-img" loading="lazy" decoding="async"></span><span class="brand-mark__wordmark d-none d-sm-inline">TechMorah <small class="brand-mark__tagline">Solution LTD</small></span><span class="visually-hidden">TechMorah Solution LTD</span></span>`;
}

const ROUTES = {
  home: "index.html",
  about: "about.html",
  services: "services.html",
  blog: "case-studies.html",
  "case-studies": "case-studies.html",
  contact: "contact.html",
  "chat.index": "chat.html",
  "contact.send": "api/contact.php",
  "chat.ai": "api/chat.php",
};

function transform(html) {
  let s = html;
  s = s.replace(/\{\{\s*route\(\s*['"]services['"]\s*\)\s*\.\s*['"](#[^'"]+)['"]\s*\}\}/g, "services.html$1");
  s = s.replace(/\{\{\s*route\(\s*['"]([^'"]+)['"]\s*\)\s*\}\}/g, (_, name) => ROUTES[name] || "index.html");
  s = s.replace(/\{\{\s*asset\(['"]([^'"]+)['"]\)\s*\}\}/g, "$1");
  s = s.replace(/\{\{\s*date\('Y'\)\s*\}\}/g, String(new Date().getFullYear()));
  s = s.replace(/\{\{\s*\$[a-zA-Z0-9_\[\]'".\s]+\s*\}\}/g, "");
  s = s.replace(/\{\{\s*([^}]+)\s*\}\}/g, (_, inner) => {
    const key = inner.trim().replace(/['"]/g, "");
    return ROUTES[key] || inner.trim();
  });
  s = s.replace(/<x-brand-mark[\s\S]*?<\/x-brand-mark>/g, brandSm());
  s = s.replace(/@php\(\$sessionId = session\(\)->getId\(\)\);?/g, "");
  s = s.replace(/@csrf|@php[\s\S]*?@endphp|@foreach[\s\S]*?@endforeach/g, "");
  s = s.replace(/Session substr\(\$sessionId, 0, 6\)…/g, "Session active");
  s = s.replace(/@if\s*\(\s*session\([^)]+\)\s*\)[\s\S]*?@endif/g, "");
  s = s.replace(/@push\('styles'\)|@endpush|@push\('scripts'\)|@stack\([^)]+\)/g, "");
  s = s.replace(/@section\([^)]+\)|@endsection|@extends\([^)]+\)/g, "");
  s = s.replace(/@hasSection\([^)]+\)|@else|@endif|@unless[\s\S]*?@endunless/g, "");
  s = s.replace(/\{\{\s*request\(\)->routeIs\([^)]+\)\s*\?\s*'[^']*'\s*:\s*''\s*\}\}/g, "");
  s = s.replace(/request\(\)->routeIs\([^)]+\)\s*\?\s*'active text-secondary'\s*:\s*''/g, "");
  s = s.replace(/\{\{--[\s\S]*?--\}\}/g, "");
  s = s.replace(/<script>[\s\S]*?consultForm[\s\S]*?<\/script>/g, "");
  s = s.replace(/<script>[\s\S]*?chatForm[\s\S]*?<\/script>/g, "");
  s = s.replace(/<script>[\s\S]*?fetch\([^)]*chat[\s\S]*?<\/script>/gi, "");
  return s;
}

function nav(active) {
  const a = (file, label, key) =>
    `<a href="${asset(file)}" class="nav-link${active === key ? " active" : ""}">${label}</a>`;
  return [
    a("index.html", "Home", "home"),
    a("about.html", "About", "about"),
    a("services.html", "Services", "services"),
    a("case-studies.html", "Case Studies", "case-studies"),
    a("chat.html", "AI Chatbot", "chat"),
    a("contact.html", "Contact", "contact"),
  ].join("\n          ");
}

function footerNavColumn(label, items) {
  const links = items
    .map((item) => {
      const href = item.external ? item.href : asset(item.href);
      const ext = item.external ? ' target="_blank" rel="noopener"' : "";
      return `<li><a href="${href}"${ext}>${item.label}</a></li>`;
    })
    .join("");
  return `<div class="col-12 col-md-6 col-lg-3"><p class="tm-footer__col-label">${label}</p><ul class="list-unstyled tm-footer__link-list">${links}</ul></div>`;
}

const defaultDescription =
  "TechMorah Solution LTD — innovative digital solutions for web & system design, microfinance, e-commerce, ISP management, payment gateway integration, monitoring, profiling, testing, and sandbox delivery.";

function organizationSchema() {
  if (!customDomain) return "";
  return `<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "TechMorah Solution LTD",
  "alternateName": ["TechMorah", "TechMorah Solution"],
  "url": "https://${customDomain}/",
  "logo": "https://${customDomain}/img/techmorah-icon.png",
  "description": "Digital solutions partner in Dar es Salaam: web and systems, microfinance, e-commerce, ISP management, payment gateways, monitoring, and sandbox delivery.",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "Dar es Salaam Science Park",
    "addressLocality": "Dar es Salaam",
    "addressCountry": "TZ"
  },
  "founder": {
    "@type": "Person",
    "name": "Sarah George Gordon",
    "alternateName": "Sarah Gordon",
    "url": "${portfolioUrl}/"
  },
  "sameAs": [
    "https://github.com/SarahGordon895/TechMorah",
    "${portfolioUrl}/"
  ]
}
</script>`;
}

function seoHead(seo = {}) {
  if (!customDomain) {
    return `<meta name="description" content="${seo.description || defaultDescription}">`;
  }
  const pageTitle = seo.title || "TechMorah Solution LTD";
  const description = seo.description || defaultDescription;
  const path = seo.path || "";
  const url = `https://${customDomain}/${path}`;
  const image = `https://${customDomain}/img/techmorah-icon.png`;
  const websiteSchema =
    path === ""
      ? `<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebSite",
  "name": "TechMorah Solution LTD",
  "alternateName": ["TechMorah", "TechMorah Solution"],
  "url": "https://${customDomain}/",
  "inLanguage": "en"
}
</script>`
      : "";
  return `<meta name="description" content="${description}">
<link rel="canonical" href="${url}">
<meta property="og:type" content="website">
<meta property="og:site_name" content="TechMorah Solution LTD">
<meta property="og:locale" content="en_US">
<meta property="og:title" content="${pageTitle}">
<meta property="og:description" content="${description}">
<meta property="og:url" content="${url}">
<meta property="og:image" content="${image}">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="${pageTitle}">
<meta name="twitter:description" content="${description}">
${organizationSchema()}
${websiteSchema}`;
}

function shell({ title, seo, body, headExtra = "", footExtra = "", hideFooterContact = false, skipChrome = false, active = "" }) {
  const chrome = skipChrome
    ? ""
    : `<nav class="navbar tm-nav" id="navbar" aria-label="Primary"><div class="container">
<a href="${asset("index.html")}" class="navbar-brand tm-nav__brand">${brandLg()}</a>
<button class="menu-toggle tm-nav__toggle" type="button" aria-controls="navMenu" aria-expanded="false" aria-label="Open menu"><span></span><span></span><span></span></button>
<div class="navbar-collapse tm-nav__menu" id="navMenu"><div class="navbar-nav tm-nav__links">
${nav(active)}
</div>
<a href="${asset("contact.html")}" class="btn btn-secondary tm-nav__cta">Talk to TechMorah</a>
</div></div></nav>`;
  const footerCol = hideFooterContact
    ? ""
    : `<div class="col-12 col-md-6 col-lg-3">
          <h5>Get In Touch</h5>
          <p><i class="fas fa-map-marker-alt me-2 text-secondary"></i> Dar es Salaam Science Park</p>
          <p><i class="fas fa-phone-alt me-2 text-secondary"></i> +255 655 139 724</p>
          <p><i class="fas fa-envelope me-2 text-secondary"></i> techmorahsolution@gmail.com</p>
        </div>`;
  return applyAssetPaths(fixHtml(`<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>${seo?.title || title}</title>
<meta name="viewport" content="width=1280, user-scalable=yes, minimum-scale=0.25, maximum-scale=5, viewport-fit=cover">
<script src="${asset("js/fitstage.js")}?v=20260818h" data-design="1280"></script>
<meta name="theme-color" content="#050a18">
${seoHead(seo)}
<link rel="icon" type="image/png" href="${asset("img/techmorah-icon.png")}">
<link rel="apple-touch-icon" href="${asset("img/techmorah-icon.png")}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:wght@400;500;600;700&family=Source+Serif+4:opsz,wght@8..60,500;8..60,600;8..60,700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="${asset("css/style.css")}?v=20260818d" rel="stylesheet">
${headExtra}
</head>
<body>
<div id="spinner" class="show" aria-hidden="true"><div class="spinner-grow" role="status"></div></div>
${chrome}
<main id="main-content">
${body}
</main>
<footer class="footer tm-footer"><div class="container"><div class="row g-4">
<div class="col-12 col-md-6 col-lg-3"><div class="footer-brand mb-3">${brandLg()}</div><p class="text-white-50 small mb-2">Innovative digital solutions — web &amp; systems, microfinance, e-commerce, ISP management, payment gateways, monitoring, and East African delivery. Dar es Salaam Science Park, Tanzania.</p><p class="text-white-50 small mb-0"><a href="${companyUrl}" class="text-white-50">techmorahsolutionltd.org</a> · <a href="${portfolioUrl}" target="_blank" rel="noopener" class="text-white-50">sarah-gordon.org</a></p></div>
${footerNavColumn("Product", productNav)}
${footerNavColumn("Solutions", solutionsNav)}
${footerCol}
</div><p class="footer-legal text-center small text-white-50 mb-0">© ${new Date().getFullYear()} TechMorah Solution LTD. All rights reserved. · Dar es Salaam Science Park · INNOVATE · INTEGRATE · IMPLEMENT · EMPOWER</p></div>
<div class="tm-footer__band">Enterprise systems · Integrations · Implementation · Support</div>
</footer>
<a href="#main-content" class="btn btn-secondary back-to-top" id="backToTop" aria-label="Back to top"><i class="fa fa-arrow-up text-white"></i></a>
<script src="${asset("js/site.js")}?v=20260812g" defer></script>
${footExtra}
</body></html>`));
}

function fixHtml(html) {
  return html.replace(/<\/?motion\b[^>]*>/gi, (m) => m.replace(/motion/gi, "div"));
}

async function extractStyles(bladePath) {
  const raw = await fs.readFile(path.join(views, bladePath), "utf8");
  const style = raw.match(/@push\('styles'\)([\s\S]*?)@endpush/);
  if (!style) return "";
  const css = transform(style[1]).replace(/<\/?style>/gi, "").trim();
  return `<style>\n${css}\n</style>`;
}

function buildServicesBody() {
  const stats = serviceStats
    .map(
      (s) => `<div class="col-6"><div class="stats-card text-center h-100"><h3 class="fw-bold mb-1">${s.value}</h3><p class="small text-white-50 mb-0">${s.label}</p></div></div>`
    )
    .join("");
  const grid = services
    .map(
      (s) => `<motion class="col-md-6 col-lg-4" id="${s.id}"><div class="service-card h-100 p-4 shadow-sm"><div class="service-icon"><i class="${s.icon}"></i></div><h4 class="fw-semibold">${s.title}</h4><p class="text-muted">${s.copy}</p><a href="${s.cta}" class="btn btn-link text-primary p-0">Explore &rarr;</a></div></div>`
    )
    .join("");
  const steps = approachSteps
    .map(
      (st) => `<div class="col-sm-12"><div class="bg-white rounded-4 p-4 shadow-sm h-100"><div class="approach-step"><h5 class="mb-2">${st.title}</h5><p class="text-muted mb-0">${st.copy}</p></div></div></div>`
    )
    .join("");
  return fixHtml(`
<section class="services-hero tm-page-hero py-5"><div class="container py-4"><div class="row g-4 align-items-center">
<div class="col-lg-7"><span class="badge bg-secondary text-uppercase mb-3">Platform, observability &amp; delivery services</span>
<h1 class="display-5 fw-bold mb-3">Digital solutions. Production delivery.</h1>
<p class="lead text-white-50 mb-4">Web &amp; system design, UI/UX, IT support, accounting systems, microfinance, e-commerce, ISP management, payment gateway integration, monitoring, profiling, testing, and sandbox delivery — scoped for East African businesses.</p>
<div class="d-flex flex-wrap gap-3"><a href="#consult" class="btn btn-secondary px-4 py-2">Book a consult</a>
<a href="https://wa.me/255655139724" target="_blank" class="btn btn-outline-light px-4 py-2">WhatsApp TechMorah</a></div></div>
<div class="col-lg-5"><div class="row g-3">${stats}</div></div></div></div></section>
<section class="py-5"><div class="container py-4"><div class="text-center mb-5"><h5 class="text-primary">What we build</h5>
<h2 class="fw-bold">Twelve service and delivery lines</h2>
<p class="text-muted mb-0">From web &amp; systems to microfinance, e-commerce, ISP, payment gateways, monitoring, and sandbox delivery.</p></div>
<div class="row g-4">${grid}</div></div></section>
<section class="bg-light py-5"><div class="container py-4"><div class="text-center mb-5"><h5 class="text-primary">Capability expansion</h5>
<h2 class="fw-bold">Performance, observability, and sandbox services</h2>
<p class="text-muted mb-0">We also support the delivery layer around applications: how they are tested, monitored, profiled, packaged, and operated after launch.</p></div>
<div class="row g-4">
<div class="col-md-6 col-lg-4"><div class="service-card h-100 p-4 shadow-sm"><div class="service-icon"><i class="fas fa-layer-group"></i></div><h4 class="fw-semibold">Environment coverage</h4><p class="text-muted">Development, testing / staging, and production support across Windows and Linux delivery paths.</p></div></div>
<div class="col-md-6 col-lg-4"><div class="service-card h-100 p-4 shadow-sm"><div class="service-icon"><i class="fas fa-binoculars"></i></div><h4 class="fw-semibold">Monitoring &amp; browser observability</h4><p class="text-muted">Tracing, browser monitoring, front-end observability, analytics, notifications, and alerting support.</p></div></div>
<div class="col-md-6 col-lg-4"><div class="service-card h-100 p-4 shadow-sm"><div class="service-icon"><i class="fas fa-microscope"></i></div><h4 class="fw-semibold">Profiling &amp; distributed analysis</h4><p class="text-muted">Continuous profiling, wall-time / CPU / IO / memory analysis, distributed profiling, and browser or CLI inspection.</p></div></div>
<div class="col-md-6 col-lg-4"><div class="service-card h-100 p-4 shadow-sm"><div class="service-icon"><i class="fas fa-vial"></i></div><h4 class="fw-semibold">Performance testing</h4><p class="text-muted">Build verification, scenarios, custom assertions, custom metrics, and performance recommendations.</p></div></div>
<div class="col-md-6 col-lg-4"><div class="service-card h-100 p-4 shadow-sm"><div class="service-icon"><i class="fas fa-toolbox"></i></div><h4 class="fw-semibold">Tooling &amp; integrations</h4><p class="text-muted">SDK, CLI, integration setup, automatic profiling, and synthetic monitoring workflows.</p></div></div>
<div class="col-md-6 col-lg-4"><div class="service-card h-100 p-4 shadow-sm"><div class="service-icon"><i class="fas fa-box-open"></i></div><h4 class="fw-semibold">Packages &amp; sandbox delivery</h4><p class="text-muted">Starter, growth, and enterprise packages with sandbox environments, support layers, and handover.</p></div></div>
</div></div></section>
<section class="bg-light py-5"><div class="container py-4"><div class="row g-4 align-items-center">
<div class="col-lg-5"><h5 class="text-primary">How we deliver</h5><h2 class="fw-bold">Clear scope from workshop to production</h2>
<p class="text-muted">Documented milestones, integration tests, and handover runbooks.</p></div>
<div class="col-lg-7"><div class="row g-4">${steps}</div></div></div></div></section>
<section class="consult-section py-5" id="consult"><div class="container py-4"><div class="row g-4 align-items-center">
<div class="col-lg-5"><span class="badge bg-secondary text-uppercase mb-3">Book a consult</span>
<h2 class="fw-bold mb-3">Match with a TechMorah consultant</h2>
<p class="text-muted">Tell us what you need — microfinance, e-commerce, ISP management, payments, SMS, monitoring, profiling, sandbox work, or a custom platform. We typically reply within one business day.</p></div>
<div class="col-lg-7"><div class="consult-card p-4 p-md-5 shadow-sm">
<h4 class="fw-semibold mb-3">Tell us about your project</h4>
<div class="alert d-none" id="consultAlert" role="alert"></div>
<form id="consultForm" data-techmorah-contact autocomplete="off"><input type="hidden" name="source" value="consultation">
<div class="honeypot-field" aria-hidden="true"><label>Website</label><input type="text" name="website_url" tabindex="-1" autocomplete="off"></div>
<div class="row g-3">
<div class="col-md-6"><label class="form-label small text-uppercase text-muted">Full name</label><input type="text" name="name" class="form-control" placeholder="Your name"></div>
<div class="col-md-6"><label class="form-label small text-uppercase text-muted">Email *</label><input type="email" name="email" class="form-control" required></div>
<div class="col-md-6"><label class="form-label small text-uppercase text-muted">Phone / WhatsApp</label><input type="text" name="phone" class="form-control"></div>
<div class="col-md-6"><label class="form-label small text-uppercase text-muted">Focus area *</label>
<select name="focus" class="form-control" required><option value="" disabled selected>Select one</option>
<option>Web & system design</option><option>Microfinance solutions</option><option>E-commerce</option>
<option>ISP management</option><option>Payment gateway & integration</option><option>Computerised accounting</option>
<option>Graphic design & UI/UX</option><option>IT support</option><option>Enterprise SMS</option><option>Monitoring, profiling & observability</option><option>Testing, sandbox & release engineering</option><option>Other</option></select></div>
<div class="col-12"><label class="form-label small text-uppercase text-muted">Project details *</label>
<textarea name="message" class="form-control" rows="4" required></textarea></div>
<div class="col-12"><button type="submit" class="btn btn-secondary px-4" id="consultSubmit">Book consult</button>
<a href="https://wa.me/255655139724" target="_blank" class="btn btn-outline-secondary px-4 ms-2">Prefer WhatsApp?</a></div>
</div></form></div></div></div></section>`);
}

function storyImage(st) {
  return st.image.startsWith("http") ? st.image : asset(st.image);
}

function buildBlogBody() {
  const stats = blogStats
    .map(
      (s) => `<div class="tm-reveal"><p class="tm-trust__value">${s.value}</p><p class="tm-trust__label">${s.label}</p></div>`
    )
    .join("");
  const stories = solutionStories
    .map(
      (st, i) => `<article class="tm-case tm-reveal"${i % 2 ? ' data-delay="1"' : ""}>
<div class="tm-case__media"><img src="${storyImage(st)}" alt="${st.client}" loading="lazy" decoding="async"></div>
<div class="tm-case__body">
<span class="tm-badge">${st.industry}</span>
<h3 class="tm-case__title">${st.client}</h3>
<dl class="tm-case__meta">
<div><dt>Challenge</dt><dd>${st.challenge}</dd></div>
<div><dt>Solution</dt><dd>${st.solution}</dd></div>
<div><dt>Outcome</dt><dd>${st.outcome}</dd></div>
</dl>
<div class="tm-case__tags">${st.services.map((x) => `<span class="tm-stack-badge">${x}</span>`).join("")}</div>
<div class="tm-case__actions">${st.live_url ? `<a href="${st.live_url}" target="_blank" rel="noopener" class="btn btn-outline-secondary">Live</a>` : ""}${st.portfolio_url ? `<a href="${st.portfolio_url}" target="_blank" rel="noopener" class="btn btn-outline-secondary">Portfolio</a>` : ""}<a href="${asset(st.cta_url)}" class="btn btn-secondary">Start similar work</a></div>
</div></article>`
    )
    .join("");
  return fixHtml(`
<section class="tm-page-hero page-header"><div class="container text-center">
<p class="tm-section-label" style="color:var(--copper-soft)">Delivery evidence</p>
<h1 class="tm-title" style="color:#fff;font-size:clamp(2rem,5vw,2.8rem)">Case studies</h1>
<p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;color:rgba(255,255,255,0.7)">Selected builds from the founder portfolio — each card follows Challenge → Solution → Outcome.</p>
<nav aria-label="breadcrumb"><ol class="breadcrumb justify-content-center mb-0">
<li class="breadcrumb-item"><a href="${asset("index.html")}" class="text-white-50">Home</a></li>
<li class="breadcrumb-item active text-white">Case Studies</li></ol></nav></div></section>
<section class="tm-trust"><div class="container"><div class="tm-trust__grid">${stats}</div></div></section>
<section class="tm-section"><div class="container">
<div class="tm-header text-center mx-auto" style="max-width:640px;margin-left:auto;margin-right:auto;">
<p class="tm-section-label">Selected work</p>
<h2 class="tm-title">Systems shipped in production</h2>
<p class="tm-lead">Extracted from the live founder portfolio — same Challenge → Solution → Outcome flow on every card.</p></div>
<div class="tm-grid tm-grid--2">${stories}</div></div></section>
<section class="tm-section tm-section--navy text-center"><div class="container">
<h2 class="tm-title">Need a system like one of these?</h2>
<p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;">Share your scope — we reply with clear next steps.</p>
<a href="${asset("contact.html")}" class="btn btn-light me-2 mb-2">Contact us</a>
<a href="${asset("services.html")}" class="btn btn-outline-light mb-2">View services</a>
</div></section>`);
}

async function expandIncludes(raw) {
  let s = raw;
  let prev;
  do {
    prev = s;
    const matches = [...s.matchAll(/@include\(['"]([^'"]+)['"](?:,\s*\[[^\]]*\])?\)/g)];
    for (const m of matches) {
      const incPath = path.join(views, m[1].replace(/\./g, "/") + ".blade.php");
      const inc = await fs.readFile(incPath, "utf8");
      s = s.replace(m[0], inc);
    }
  } while (s !== prev);
  return s;
}

async function readBlade(rel) {
  const raw = await fs.readFile(path.join(views, rel), "utf8");
  return expandIncludes(raw);
}

function stripBlade(raw) {
  let s = raw.replace(/@extends\([\s\S]*?\)\s*/g, "");
  const style = s.match(/@push\('styles'\)([\s\S]*?)@endpush/);
  s = s.replace(/@push\('styles'\)[\s\S]*?@endpush/g, "");
  s = s.replace(/@push\('scripts'\)[\s\S]*?@endpush/g, "");
  const topbar = s.match(/@section\('page_topbar'\)([\s\S]*?)(?=@section)/);
  const navbar = s.match(/@section\('page_navbar'\)([\s\S]*?)(?=@section)/);
  const content = s.match(/@section\('content'\)([\s\S]*?)(?=@endsection|@push|$)/);
  let cssBlock = "";
  if (style) {
    const raw = transform(style[1]).replace(/<\/?style>/gi, "").trim();
    cssBlock = raw.includes("<link") ? raw : `<style>\n${raw}\n</style>`;
  }
  return {
    style: cssBlock,
    body: transform((topbar?.[1] || "") + (navbar?.[1] || "") + (content?.[1] || "")),
  };
}

function patchContact(body) {
  const formTag = includePhp
    ? '<form id="contactForm" data-techmorah-contact method="POST" action="api/contact.php">'
    : '<form id="contactForm" data-techmorah-contact>';
  let s = body.replace(/<form id="contactForm"[^>]*>/, formTag).replace(/<input[^>]*name="_token"[^>]*>/g, "");
  return fixHtml(s);
}

async function copyPublic() {
  async function cp(src, dest) {
    const st = await fs.stat(src);
    if (st.isDirectory()) {
      await fs.mkdir(dest, { recursive: true });
      for (const n of await fs.readdir(src)) {
        if (n === "index.php") continue;
        await cp(path.join(src, n), path.join(dest, n));
      }
    } else await fs.copyFile(src, dest);
  }
  for (const n of await fs.readdir(publicDir)) {
    if (n === "index.php") continue;
    await cp(path.join(publicDir, n), path.join(docs, n));
  }
}

async function copyApi() {
  await fs.mkdir(path.join(docs, "api"), { recursive: true });
  for (const f of ["contact.php", "chat.php"]) {
    await fs.copyFile(path.join(apiTpl, f), path.join(docs, "api", f));
  }
}

async function main() {
  await fs.rm(docs, { recursive: true, force: true });
  await fs.mkdir(docs, { recursive: true });
  await copyPublic();

  const pages = [
    {
      blade: "home.blade.php",
      out: "index.html",
      title: "TechMorah Solution LTD — Fintech & Enterprise Technology Partner",
      active: "home",
      seo: {
        title: "TechMorah Solution LTD — Digital Solutions Partner in Dar es Salaam",
        description:
          "Official site of TechMorah Solution LTD (TechMorah Solution): web and system design, microfinance, e-commerce, ISP management, payment gateways, monitoring, profiling, testing, and sandbox delivery in Dar es Salaam, Tanzania. Founded by Sarah George Gordon.",
        path: "",
      },
    },
    {
      blade: "pages/about.blade.php",
      out: "about.html",
      title: "About | TechMorah Solution LTD",
      active: "about",
      seo: {
        title: "About TechMorah Solution LTD — Innovate, Integrate, Implement",
        description:
          "About TechMorah Solution LTD: digital solutions partner at Dar es Salaam Science Park. Web systems, microfinance, e-commerce, ISP, payments, monitoring, and sandbox delivery. Founded by Sarah George Gordon.",
        path: "about.html",
      },
    },
    {
      blade: "contacts.blade.php",
      out: "contact.html",
      title: "Contact | TechMorah Solution LTD",
      active: "contact",
      seo: {
        title: "Contact TechMorah Solution LTD — Dar es Salaam",
        description:
          "Contact TechMorah Solution LTD in Dar es Salaam Science Park. Discuss microfinance, e-commerce, ISP, payments, monitoring, sandbox delivery, or a custom platform.",
        path: "contact.html",
      },
      foot: `<script src="${asset("js/contact-form.js")}"></script>\n<script src="${asset("js/contact-whatsapp.js")}"></script>\n<script src="${asset("js/contact-page.js")}"></script>`,
      hideFooterContact: false,
      skipChrome: false,
      patch: patchContact,
    },
    {
      blade: "chat.blade.php",
      out: "chat.html",
      title: "AI Copilot | TechMorah",
      active: "chat",
      seo: {
        title: "AI Chatbot | TechMorah Solution LTD",
        description:
          "Talk to TechMorah Solution LTD about digital solutions, microfinance, e-commerce, ISP management, payment gateways, monitoring, and sandbox delivery.",
        path: "chat.html",
      },
      foot: `<script src="${asset("js/chat-script.js")}?v=20260812j"></script>\n<script src="${asset("js/chat-bot.js")}?v=20260812j"></script>`,
    },
  ];

  for (const p of pages) {
    const parts = stripBlade(await readBlade(p.blade));
    let body = parts.body;
    if (p.patch) body = p.patch(body);
    await fs.writeFile(
      path.join(docs, p.out),
      shell({
        title: p.title,
        seo: p.seo,
        active: p.active,
        body: fixHtml(body),
        headExtra: parts.style,
        footExtra: p.foot || "",
        hideFooterContact: p.hideFooterContact,
        skipChrome: p.skipChrome,
      })
    );
    console.log("✓", p.out);
  }

  const servicesParts = stripBlade(await readBlade("pages/services.blade.php"));
  await fs.writeFile(
    path.join(docs, "services.html"),
    shell({
      title: "Services | TechMorah Solution LTD",
      active: "services",
      seo: {
        title: "Services | TechMorah Solution LTD",
        description:
          "TechMorah Solution LTD services: web and system design, UI/UX, microfinance systems, e-commerce, ISP management, payment gateway integration, monitoring, profiling, testing, sandbox delivery, and IT support in Tanzania.",
        path: "services.html",
      },
      body: fixHtml(servicesParts.body),
      headExtra: servicesParts.style,
      footExtra: `<script src="${asset("js/contact-form.js")}"></script>`,
    })
  );
  console.log("✓ services.html");

  const caseStudiesExtra = `<style>.tm-case__media img{object-position:top center}</style>`;
  await fs.writeFile(
    path.join(docs, "case-studies.html"),
    shell({
      title: "Case Studies | TechMorah Solution LTD",
      active: "case-studies",
      seo: {
        title: "Case Studies | TechMorah Solution LTD",
        description:
          "TechMorah Solution LTD case studies: production platforms for e-commerce, SMS, payments, and ISP delivery in East Africa.",
        path: "case-studies.html",
      },
      body: buildBlogBody(),
      headExtra: caseStudiesExtra,
      footExtra: `<script src="${asset("js/blog-newsletter.js")}"></script>`,
    })
  );
  console.log("✓ case-studies.html");
  await fs.writeFile(
    path.join(docs, "blog.html"),
    shell({
      title: "Blog | TechMorah Solution LTD",
      active: "blog",
      body: `<motion class="container py-5 text-center"><h1 class="mb-3">This page has moved</h1><p class="text-muted mb-4">Our case studies and delivery stories now live on a dedicated page.</p><a href="${asset("case-studies.html")}" class="btn btn-secondary rounded-pill px-4">View Case Studies</a></motion>`,
      headExtra: `<meta http-equiv="refresh" content="0;url=${asset("case-studies.html")}">`,
    })
  );
  console.log("✓ blog.html (redirect)");

  if (includePhp) await copyApi();

  await fs.writeFile(
    path.join(docs, "404.html"),
    shell({
      title: "Page not found | TechMorah Solution LTD",
      active: "",
      body: `<section class="tm-section tm-section--navy text-center" style="min-height:55vh;display:flex;align-items:center;"><div class="container"><p class="tm-section-label">404</p><h1 class="tm-title">This page is not available</h1><p class="tm-lead mx-auto" style="margin-left:auto;margin-right:auto;">The link may be outdated. Return to TechMorah home or contact the team.</p><a href="${asset("index.html")}" class="btn btn-light me-2 mb-2">Home</a><a href="${asset("contact.html")}" class="btn btn-outline-light mb-2">Contact</a></div></section>`,
    })
  );

  await ensureImages();
  await fs.writeFile(path.join(docs, ".nojekyll"), "");
  if (customDomain) {
    await fs.writeFile(path.join(docs, "CNAME"), `${customDomain}\n`);
  }
  const label = standalone ? "TechMorah-site (HTML/CSS/JS)" : "docs/ (GitHub Pages)";
  console.log(`Done — ${label} at:\n  ${docs}\n  Live prefix: ${sitePrefix || "(root / relative)"}${customDomain ? `\n  Custom domain: https://${customDomain}` : ""}`);
}

async function ensureImages() {
  const imgDir = path.join(docs, "img");
  const fallback = path.resolve(root, "../../TechMorah-site/img");
  try {
    const needed = await fs.readdir(fallback);
    await fs.mkdir(imgDir, { recursive: true });
    for (const name of needed) {
      if (name.startsWith("._")) continue;
      const dest = path.join(imgDir, name);
      try {
        await fs.access(dest);
      } catch {
        await fs.copyFile(path.join(fallback, name), dest);
      }
    }
  } catch {
    /* optional fallback folder */
  }
}

main().catch((e) => {
  console.error(e);
  process.exit(1);
});

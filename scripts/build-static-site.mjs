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
/** GitHub Pages (gh-pages) serves at /TechMorah/ — not /TechMorah/docs/ */
const baseArg = args.find((a) => a.startsWith("--base="));
const sitePrefix = baseArg
  ? baseArg.slice("--base=".length).replace(/\/$/, "")
  : standalone
    ? ""
    : "/TechMorah";

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

function shell({ title, active, body, headExtra = "", footExtra = "", hideFooterContact = false, skipChrome = false }) {
  const chrome = skipChrome
    ? ""
    : `<motion class="container-fluid bg-dark py-2 d-none d-md-flex"><div class="container d-flex justify-content-between align-items-center">
<div class="text-white-50 small"><i class="fas fa-map-marker-alt text-secondary me-2"></i> Dar es Salaam Science Park, Tanzania <span class="mx-3">|</span> <i class="fas fa-envelope text-secondary me-2"></i> techmorahsolution@gmail.com</div>
<div class="d-flex gap-2">
<a href="https://www.facebook.com/share/1JnhuGhcnf/" target="_blank" rel="noopener" class="btn btn-sm btn-light rounded-circle"><i class="fab fa-facebook-f text-primary"></i></a>
<a href="https://www.linkedin.com/in/sarah-gordon-0502b335b" target="_blank" rel="noopener" class="btn btn-sm btn-light rounded-circle"><i class="fab fa-linkedin-in text-primary"></i></a>
<a href="https://www.instagram.com/techmorahsolution_ltd" target="_blank" rel="noopener" class="btn btn-sm btn-light rounded-circle"><i class="fab fa-instagram text-primary"></i></a>
</div></div></div>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm"><div class="container">
<a href="${asset("index.html")}" class="navbar-brand text-white d-flex align-items-center">${brandLg()}</a>
<button class="navbar-toggler menu-toggle" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"><span></span><span></span><span></span></button>
<div class="collapse navbar-collapse" id="navMenu"><div class="navbar-nav ms-auto gap-lg-2">
${nav(active)}
</motion>
<a href="tel:+255655139724" class="btn btn-sm btn-secondary d-none d-xl-inline-block ms-3">Call Us</a>
</div></motion></nav>`;
  const footerCol = hideFooterContact
    ? ""
    : `<div class="col-md-4">
          <h5 class="text-secondary mb-3">Get In Touch</h5>
          <p><i class="fas fa-phone-alt me-2 text-secondary"></i> +255 655 139 724</p>
          <p><i class="fas fa-envelope me-2 text-secondary"></i> techmorahsolution@gmail.com</p>
        </div>`;
  return applyAssetPaths(fixHtml(`<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>${title}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="TechMorah Solution LTD — AI, IT support, web systems, and digital solutions in Tanzania.">
<link rel="icon" type="image/png" href="${asset("img/techmorah-icon.png")}">
<link rel="apple-touch-icon" href="${asset("img/techmorah-icon.png")}">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&family=Saira:wght@600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="${asset("lib/animate/animate.min.css")}" rel="stylesheet">
<link href="${asset("css/bootstrap.min.css")}" rel="stylesheet">
<link href="${asset("css/style.css")}" rel="stylesheet">
${headExtra}
</head>
<body>
<div id="spinner" class="show position-fixed w-100 vh-100 top-50 start-50 d-flex justify-content-center align-items-center bg-white"><div class="spinner-grow text-primary" role="status"></div></div>
${chrome}
${body}
<footer class="footer bg-dark text-light pt-5"><div class="container pb-4"><div class="row g-4">
<div class="col-md-4"><div class="footer-brand">${brandLg()}</div><p class="text-white-50 small">Enterprise web, SMS, payments &amp; integrations — Dar es Salaam, Tanzania.</p></div>
<div class="col-md-4"><h5 class="text-secondary mb-3">Quick Links</h5><ul class="list-unstyled">
<li><a href="${asset("about.html")}" class="text-white-50 text-decoration-none">About</a></li>
<li><a href="${asset("services.html")}" class="text-white-50 text-decoration-none">Services</a></li>
<li><a href="${asset("contact.html")}" class="text-white-50 text-decoration-none">Contact</a></li>
<li><a href="${asset("chat.html")}" class="text-white-50 text-decoration-none">AI Chatbot</a></li>
</ul></div>
${footerCol}
</div><hr class="text-secondary"><p class="text-center small text-white-50 mb-0">© ${new Date().getFullYear()} TechMorah Solution LTD. All rights reserved.</p></div></footer>
<a href="#" class="btn btn-secondary rounded-circle back-to-top"><i class="fa fa-arrow-up text-white"></i></a>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="${asset("lib/wow/wow.min.js")}"></script>
<script src="${asset("lib/easing/easing.min.js")}"></script>
<script src="${asset("lib/waypoints/waypoints.min.js")}"></script>
<script src="${asset("js/main.js")}"></script>
<script src="${asset("js/site.js")}"></script>
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
<section class="services-hero py-5"><div class="container py-4"><div class="row g-4 align-items-center">
<div class="col-lg-7"><span class="badge bg-secondary text-uppercase mb-3">TechMorah Services</span>
<h1 class="display-5 fw-bold mb-3">Full-stack systems, integrations &amp; support</h1>
<p class="lead text-white-50 mb-4">Enterprise SMS, payment sandboxes, Laravel web systems, UI/UX, and AI-assisted operations — scoped for East African teams.</p>
<div class="d-flex flex-wrap gap-3"><a href="#consult" class="btn btn-secondary px-4 py-2">Book a consult</a>
<a href="https://wa.me/255655139724" target="_blank" class="btn btn-outline-light px-4 py-2">WhatsApp TechMorah</a></div></div>
<div class="col-lg-5"><div class="row g-3">${stats}</div></div></div></div></section>
<section class="py-5"><div class="container py-4"><div class="text-center mb-5"><h5 class="text-primary">What we build</h5>
<h2 class="fw-bold">Services engineered around TechMorah delivery playbooks</h2>
<p class="text-muted mb-0">Bilingual UX research, automation, and post-launch care.</p></div>
<div class="row g-4">${grid}</div></motion></section>
<section class="bg-light py-5"><div class="container py-4"><div class="row g-4 align-items-center">
<div class="col-lg-5"><h5 class="text-primary">How we deliver</h5><h2 class="fw-bold">Observability + human touch in every sprint</h2>
<p class="text-muted">WhatsApp, AI copilots, and dashboards keep every stakeholder in sync.</p></div>
<div class="col-lg-7"><div class="row g-4">${steps}</div></div></div></div></section>
<section class="consult-section py-5" id="consult"><div class="container py-4"><motion class="row g-4 align-items-center">
<div class="col-lg-5"><span class="badge bg-secondary text-uppercase mb-3">Book a consult</span>
<h2 class="fw-bold mb-3">Match with a TechMorah consultant in one form</h2>
<p class="text-muted">Tell us what you need and a human expert follows up the same day.</p></div>
<div class="col-lg-7"><div class="consult-card p-4 p-md-5 shadow-sm">
<h4 class="fw-semibold mb-3">Tell us about your project</h4>
<div class="alert d-none" id="consultAlert" role="alert"></div>
<form id="consultForm" data-techmorah-contact autocomplete="off"><input type="hidden" name="source" value="consultation">
<div class="row g-3">
<div class="col-md-6"><label class="form-label small text-uppercase text-muted">Full name</label><input type="text" name="name" class="form-control" placeholder="Your name"></div>
<div class="col-md-6"><label class="form-label small text-uppercase text-muted">Email *</label><input type="email" name="email" class="form-control" required></div>
<div class="col-md-6"><label class="form-label small text-uppercase text-muted">Phone / WhatsApp</label><input type="text" name="phone" class="form-control"></div>
<div class="col-md-6"><label class="form-label small text-uppercase text-muted">Focus area *</label>
<select name="focus" class="form-control" required><option value="" disabled selected>Select one</option>
<option>AI Integration & Automation</option><option>Web & System Design</option><option>IT Support & NOC</option>
<option>Computerized Accounting</option><option>Other / Custom</option></select></div>
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
      (s) => `<div class="col-6 col-lg-3"><div class="d-flex stat-card p-4"><h1 class="me-3 text-primary">${s.value}</h1><h5 class="mb-0">${s.label}</h5></div></div>`
    )
    .join("");
  const tags = blogTags.map((t) => `<a href="#" class="text-dark text-decoration-none">#${t}</a>`).join("\n");
  const stories = solutionStories
    .map(
      (st) => `<div class="col-md-6 col-xl-3"><div class="h-100 border rounded-4 overflow-hidden d-flex flex-column">
<div class="ratio ratio-4x3 bg-light"><img src="${storyImage(st)}" class="w-100 h-100 object-fit-cover" alt="${st.client}" loading="lazy" decoding="async"></div>
<div class="p-4 d-flex flex-column flex-grow-1"><span class="badge bg-secondary text-uppercase small mb-2">${st.industry}</span>
<h5 class="fw-semibold">${st.client}</h5>
<p class="text-muted small mb-1"><strong>Challenge:</strong> ${st.challenge}</p>
<p class="text-muted small mb-1"><strong>Solution:</strong> ${st.solution}</p>
<p class="text-muted small mb-3"><strong>Outcome:</strong> ${st.outcome}</p>
<div class="d-flex flex-wrap gap-2 mb-3">${st.services.map((x) => `<span class="badge bg-dark text-white">${x}</span>`).join("")}</div>
<div class="mt-auto d-flex flex-wrap gap-2">${st.portfolio_url ? `<a href="${st.portfolio_url}" target="_blank" rel="noopener" class="btn btn-sm btn-outline-secondary">View project</a>` : ""}<a href="${asset(st.cta_url)}" class="text-primary fw-semibold">Start similar work &rarr;</a></motion></div></div></div>`
    )
    .join("");
  const spotlights = serviceSpotlights
    .map(
      (sp) => `<div class="col-md-4"><div class="p-4 h-100 border rounded-4"><h5 class="text-primary">${sp.title}</h5>
<p class="text-muted mb-3">${sp.description}</p><a href="${asset(sp.link)}" class="text-primary fw-semibold">${sp.label}</a></div></motion>`
    )
    .join("");
  return fixHtml(`
<div class="blog-page">
<div class="container-fluid page-header py-5"><div class="container text-center py-5">
<h1 class="display-2 text-white mb-4">Case Studies</h1>
<p class="lead text-white-50 mx-auto mb-4" style="max-width:640px">Real screenshots from enterprise SMS, payments, and SME systems we deliver.</p>
<nav aria-label="breadcrumb"><ol class="breadcrumb justify-content-center mb-0">
<li class="breadcrumb-item"><a href="index.html" class="text-white-50 text-decoration-none">Home</a></li>
<li class="breadcrumb-item active text-white">Case Studies</li></ol></nav></div></div>
<div class="container-fluid bg-secondary py-5"><div class="container"><div class="row g-4 text-white">${stats}</div></div></div>
<div class="container py-5"><div class="row g-5">
<div class="col-lg-7"><div class="bg-dark text-white rounded-4 p-5"><h2 class="mb-3">Subscribe for TechMorah updates</h2>
<p class="text-white-50">Actionable playbooks and engineering write-ups. No spam.</p>
<form class="row g-3 align-items-center" id="newsletterForm"><div class="col-sm"><input type="email" class="form-control form-control-lg" placeholder="Email address" required></div>
<div class="col-sm-auto"><button class="btn btn-secondary btn-lg" type="submit">Subscribe</button></div></form></div></div>
<div class="col-lg-5"><div class="bg-light rounded-4 p-4 h-100"><h4 class="mb-4">Popular Tags</h4><div class="tag-cloud d-flex flex-wrap gap-2">${tags}</div></div></div></div></div>
<div class="container pb-5"><div class="text-center mx-auto pb-4" style="max-width:700px">
<h5 class="text-primary text-uppercase">All case studies</h5><h2 class="mb-3">Client launches &amp; delivery notes</h2>
<p class="text-muted">Victoria Lush and LipaPay use real project screenshots; other stories summarize sector work.</p></div>
<div class="row g-4">${stories}</div></div>
<div class="container pb-5"><div class="row g-4">${spotlights}</div></div>
<div class="bg-primary py-5"><div class="container text-center text-white"><h2 class="mb-3">Ready to Transform Your Business?</h2>
<p class="mb-4">Talk to TechMorah experts about AI, cloud, and digital experiences.</p>
<div class="d-flex flex-column flex-sm-row justify-content-center gap-3">
<a href="contact.html" class="btn btn-light text-primary px-4 py-2">Contact Us</a>
<a href="services.html" class="btn btn-outline-light px-4 py-2">View Services</a></div></div></div></div>`);
}

async function expandIncludes(raw) {
  let s = raw;
  let prev;
  do {
    prev = s;
    const matches = [...s.matchAll(/@include\(['"]([^'"]+)['"]\)/g)];
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
    { blade: "home.blade.php", out: "index.html", title: "TechMorah Solution LTD — Enterprise Web, SMS & Integration", active: "home" },
    { blade: "pages/about.blade.php", out: "about.html", title: "About | TechMorah Solution LTD", active: "about" },
    {
      blade: "contacts.blade.php",
      out: "contact.html",
      title: "Contact | TechMorah Solution LTD",
      active: "contact",
      foot: `<script src="${asset("js/contact-form.js")}"></script>\n<script src="${asset("js/contact-whatsapp.js")}"></script>\n<script src="${asset("js/contact-chat-embed.js")}"></script>\n<script src="${asset("js/contact-page.js")}"></script>\n<script src="${asset("js/site.js")}"></script>`,
      hideFooterContact: false,
      skipChrome: false,
      patch: patchContact,
    },
    { blade: "chat.blade.php", out: "chat.html", title: "AI Copilot | TechMorah", active: "chat", foot: `<script src="${asset("js/chat-bot.js")}"></script>` },
  ];

  for (const p of pages) {
    const parts = stripBlade(await readBlade(p.blade));
    let body = parts.body;
    if (p.patch) body = p.patch(body);
    await fs.writeFile(
      path.join(docs, p.out),
      shell({
        title: p.title,
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

  const servicesStyle = await extractStyles("pages/services.blade.php");
  await fs.writeFile(
    path.join(docs, "services.html"),
    shell({
      title: "Services | TechMorah Solution LTD",
      active: "services",
      body: buildServicesBody(),
      headExtra: servicesStyle,
      footExtra: `<script src="${asset("js/contact-form.js")}"></script>`,
    })
  );
  console.log("✓ services.html");

  const caseStudiesStyle = await extractStyles("blog.blade.php");
  const caseStudiesExtra = `${caseStudiesStyle}
<style>.tm-case-card--featured{border-width:2px;border-color:rgba(255,117,15,.35)}.case-studies-page .tm-case-card img{object-position:top center}</style>`;
  await fs.writeFile(
    path.join(docs, "case-studies.html"),
    shell({
      title: "Case Studies | TechMorah Solution LTD",
      active: "case-studies",
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

  const indexHtml = await fs.readFile(path.join(docs, "index.html"), "utf8");
  await fs.writeFile(path.join(docs, "404.html"), indexHtml);

  await ensureImages();
  await fs.writeFile(path.join(docs, ".nojekyll"), "");
  const label = standalone ? "TechMorah-site (HTML/CSS/JS)" : "docs/ (GitHub Pages)";
  console.log(`Done — ${label} at:\n  ${docs}\n  Live prefix: ${sitePrefix || "(relative)"}`);
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

/**
 * TechMorah Copilot — question script aligned to company services & delivery.
 * Used by chat-bot.js for suggested prompts + answer matching.
 */
(function (global) {
  const WA = "+255 655 139 724";
  const EMAIL = "techmorahsolution@gmail.com";
  const HQ = "Dar es Salaam Science Park";
  const handoff = () =>
    `Next step: WhatsApp ${WA}, email ${EMAIL}, or the website contact form. HQ: ${HQ}.`;

  const SCRIPT = {
    version: "2026.08.12",
    company: "TechMorah Solution LTD",
    categories: [
      {
        id: "overview",
        label: "Company & services",
        questions: [
          {
            q: "What services does TechMorah offer?",
            keys: ["what services", "services overview", "what do you offer", "catalogue", "capabilities"],
            a: "TechMorah Solution LTD provides innovative digital solutions:\n1) Web & system design & development\n2) System design & development\n3) Graphic design & UI/UX\n4) IT support services\n5) Computerised accounting\n6) Microfinance solutions\n7) E-commerce solutions\n8) ISP management\n9) Payment gateway & integration\n10) Enterprise SMS platforms\n\nWhich line should we focus on for your business?",
          },
          {
            q: "Who is TechMorah and where are you based?",
            keys: ["who is techmorah", "where are you", "location", "based", "science park", "about company"],
            a: `TechMorah Solution LTD is a founder-led digital solutions company. We design, build, integrate, and support production systems for East African businesses.\n\nHeadquarters: ${HQ}.\nContact: WhatsApp ${WA} · ${EMAIL}.`,
          },
          {
            q: "How do you deliver projects from start to finish?",
            keys: ["how do you deliver", "process", "methodology", "workflow", "discovery", "handover"],
            a: "Our delivery flow:\n01 Discover & align — goals, users, success metrics\n02 Design the experience — wireframes, UI, brand source of truth\n03 Build & integrate — Laravel/React, APIs, payments, SMS, AI hooks\n04 Launch & support — hosting, training, runbooks, iteration\n\nShare your timeline and must-have modules and I will outline a first release.",
          },
          {
            q: "What technology stack do you use?",
            keys: ["tech stack", "technology", "laravel", "react", "flutter", "tools"],
            a: "Common production stack: Laravel, PHP, React, Flutter, Filament, MySQL/SQL Server, REST/Swagger, Twilio/SMS, OpenAI/LLM tooling, Linux VPS, shared hosting, IIS, and mobile-money integrations (including M-Pesa patterns).\n\nFor AI/ML we add Python services and API wrappers behind stable business apps when needed.",
          },
        ],
      },
      {
        id: "web",
        label: "Web & systems",
        questions: [
          {
            q: "Can you build a custom web portal for my company?",
            keys: ["web portal", "custom website", "corporate website", "intranet", "dashboard"],
            a: "Yes. Web & system design covers user-friendly, secure, scalable websites and portals — admin dashboards, customer portals, and operational systems.\n\nTell me: who the users are, which modules matter most, and whether you prefer Linux VPS or shared hosting.",
          },
          {
            q: "Do you build custom business systems beyond websites?",
            keys: ["custom system", "business system", "crm", "workflow system", "system design"],
            a: "Yes. System design & development focuses on customised solutions that optimise business processes — approvals, ops desks, HR/leave-style workflows, and internal tools.\n\nDescribe the process you want to digitise and the pain in your current tools.",
          },
          {
            q: "Can you redesign our UI/UX and brand visuals?",
            keys: ["ui/ux", "ui ux", "redesign", "graphic design", "brand", "wireframe"],
            a: "Graphic design & UI/UX covers creative visuals and intuitive interfaces — wireframes, prototypes, and design systems that hand off cleanly to engineering.\n\nAre you redesigning an existing product, or designing screens for a new build?",
          },
        ],
      },
      {
        id: "microfinance",
        label: "Microfinance",
        questions: [
          {
            q: "Can TechMorah build a microfinance or MFI system?",
            keys: ["microfinance", "mfi", "sacco", "loan system", "savings system", "member"],
            a: "Yes. Microfinance solutions cover member onboarding, loans, savings, approvals, repayments, and reporting for MFIs and community lenders.\n\nOptional later: AI risk scoring or document OCR — after core ledger workflows are solid.\n\n" + handoff(),
          },
          {
            q: "What modules are typical in a microfinance build?",
            keys: ["microfinance modules", "loan modules", "mfi modules"],
            a: "Typical first release:\n• Members & KYC profiles\n• Loan products & applications\n• Approvals & disbursement records\n• Repayments & arrears views\n• Savings/shares (if required)\n• Basic reports for management\n\nWe scope exact modules after a discovery workshop.",
          },
        ],
      },
      {
        id: "ecommerce",
        label: "E-commerce",
        questions: [
          {
            q: "Can you build an online shop with cart and checkout?",
            keys: ["online shop", "e-commerce", "ecommerce", "cart", "checkout", "storefront"],
            a: "Yes. E-commerce solutions include catalogue, inventory, cart, checkout, CMS, and admin ops (Laravel + Filament patterns similar to Active Targets).\n\nShare catalogue size, delivery regions, and preferred payment methods.",
          },
          {
            q: "Can the shop connect to mobile money payments?",
            keys: ["shop payment", "checkout m-pesa", "ecommerce payment"],
            a: "Yes. Checkout can integrate payment gateway/mobile-money flows with callbacks and order status updates.\n\nWe usually stage in a sandbox first, then go live with reconciliation checks.",
          },
        ],
      },
      {
        id: "isp",
        label: "ISP management",
        questions: [
          {
            q: "Do you build ISP management systems for fibre providers?",
            keys: ["isp", "fibre", "fiber", "internet provider", "subscriber billing", "isp management"],
            a: "Yes. ISP management covers packages, coverage/leads, subscribers, billing, support tickets, and payment journeys (Savanna Fibre–style digital ops).\n\nAre you starting with customer acquisition or back-office billing?",
          },
          {
            q: "Can customers pay internet bills online or via USSD/mobile money?",
            keys: ["internet bill", "isp payment", "fibre payment", "ussd pay"],
            a: "Yes. We design bill-pay journeys with payment gateway integration, status updates, and admin reconciliation.\n\nTell me your current billing tool and MNOs you need.",
          },
        ],
      },
      {
        id: "payments",
        label: "Payments",
        questions: [
          {
            q: "Can you integrate a payment gateway for collections and payouts?",
            keys: ["payment gateway", "collections", "disbursement", "payout", "m-pesa", "mobile money", "lipa"],
            a: "Yes. Payment gateway & integration covers collections, disbursements, sandboxes, callbacks, environments/keys, and reconciliation-aware flows (LipaPay-style production patterns).\n\nSecurity first: signed callbacks, idempotent transactions, and clear settlement reports.\n\nWhich do you need first — collect, payout, airtime, or agent desk?",
          },
          {
            q: "Do you provide a sandbox for developers before go-live?",
            keys: ["sandbox", "staging", "test api", "developer hub"],
            a: "Yes. We commonly ship a sandbox/docs hub plus an authenticated merchant workspace for keys, webhooks, and test transactions before production.\n\n" + handoff(),
          },
          {
            q: "Can you build an agent or wakala back office?",
            keys: ["wakala", "agent back office", "pos agent", "agent dashboard"],
            a: "Yes. Agent back offices can include organisation setup, users/roles, inventory/POS status, complaints, activity logs, and API management — similar to Lipa Wakala–style desks.\n\nShare roles (admin, agent, manager) and daily tasks to automate.",
          },
        ],
      },
      {
        id: "sms",
        label: "SMS & messaging",
        questions: [
          {
            q: "Can you build an enterprise SMS portal?",
            keys: ["sms portal", "bulk sms", "sender id", "enterprise sms", "sms platform"],
            a: "Yes. Enterprise SMS platforms include admin consoles, reseller/customer portals, templates, sender IDs, credits, and delivery history (Victoria Lush–style stacks).\n\nWhat monthly volume and user roles do you expect?",
          },
          {
            q: "Do you have a phone app that captures customer SMS for agents?",
            keys: ["listener", "android desk", "sms desk", "imart listener", "message desk"],
            a: "Yes. TechMorah/partner delivery patterns include an Android Listener-style desk app paired with a web portal for conversations, templates, outgoing messages, and settings.\n\nAgents can work from phone + portal with shared credentials.",
          },
        ],
      },
      {
        id: "support-accounting",
        label: "Support & accounting",
        questions: [
          {
            q: "Do you offer IT support after launch?",
            keys: ["it support", "support after launch", "maintenance", "monitoring", "helpdesk"],
            a: "Yes. IT support services cover reliable technical support, monitoring, incident handling, and operational continuity so teams stay productive.\n\nTell me how many systems/sites you run and your urgency window.",
          },
          {
            q: "Can you build computerised accounting or fee tracking?",
            keys: ["accounting", "fee tracking", "receipts", "invoices", "finance system"],
            a: "Yes. Computerised accounting solutions streamline financial records, receipts, approvals, and reporting — including fee tracking/reminder style workflows for schools and similar orgs.\n\nWhat reports must management see weekly?",
          },
          {
            q: "Do you handle hosting, SSL, and deployment?",
            keys: ["hosting", "ssl", "vps", "deployment", "linux"],
            a: "Yes. We deploy and hand over on Linux VPS or shared hosting with SSL, DNS, backups, and runbooks — proven on production SMS and payments stacks.\n\nDo you already have a host, or should we recommend one?",
          },
        ],
      },
      {
        id: "ai",
        label: "AI & ML",
        questions: [
          {
            q: "How should we approach an AI or machine learning project?",
            keys: ["ai project", "machine learning project", "ml approach", "start ai", "ml strategy"],
            a: "Practical sequence I recommend:\n1) Define the decision/KPI to improve\n2) Audit data quality and labelling needs\n3) Ship a baseline (rules or simple model)\n4) Choose classical ML or deep learning only if needed\n5) Evaluate, monitor drift, keep humans in the loop\n6) Deploy into web/WhatsApp/ops desks\n\nShare your use case (support routing, OCR, churn, fraud, forecasting).",
          },
          {
            q: "Should we use RAG or fine-tuning for a support desk?",
            keys: ["rag", "fine-tun", "fine tuning", "llm", "support desk ai"],
            a: "RAG is usually best when answers must stay grounded in changing documents. Fine-tuning helps stable tone/format on repeatable tasks. Many desks combine RAG + tools + human escalation.\n\nTechMorah embeds assistants with auth, logging, and WhatsApp/web handoff.",
          },
          {
            q: "Can you add an AI chatbot to our website or WhatsApp?",
            keys: ["add chatbot", "website chatbot", "whatsapp bot", "ai assistant"],
            a: "Yes. We implement AI assistants for web chat and WhatsApp-style channels with guardrails, escalation to humans, and logging.\n\nTell me the top 10 customer questions and which channel matters first.",
          },
        ],
      },
      {
        id: "commercial",
        label: "Pricing & contact",
        questions: [
          {
            q: "How much does a project cost?",
            keys: ["how much", "pricing", "cost", "quote", "budget", "price"],
            a: "Pricing depends on scope, integrations, and delivery model (fixed project, phased release, or managed support). AI/ML work is quoted after data readiness and KPI clarity.\n\nShare modules + timeline for a practical estimate.\n" + handoff(),
          },
          {
            q: "How should I contact TechMorah for a project?",
            keys: ["contact", "whatsapp", "email", "reach", "talk to", "call"],
            a: `Reach TechMorah:\n• WhatsApp ${WA}\n• Email ${EMAIL}\n• Website contact form\n• HQ: ${HQ}\n• Instagram: TechMorah_Solution\n\nInclude your goal, users, and preferred go-live window.`,
          },
          {
            q: "What information should I prepare before a consult?",
            keys: ["prepare", "consult", "brief", "requirements", "kickoff"],
            a: "Bring:\n• Business goal and success metric\n• Users/roles\n• Must-have modules for v1\n• Integrations (payments, SMS, existing systems)\n• Timeline and hosting preference\n• Sample data/documents if AI is involved\n\nThen we can run a clear discovery workshop.",
          },
        ],
      },
    ],
  };

  /** Flatten all Q&A for matching */
  function allEntries() {
    const out = [];
    SCRIPT.categories.forEach((cat) => {
      cat.questions.forEach((item) => {
        out.push({
          category: cat.id,
          categoryLabel: cat.label,
          question: item.q,
          keys: item.keys || [],
          answer: item.a,
        });
      });
    });
    return out;
  }

  /** Score a user prompt against script entries */
  function match(prompt) {
    const text = String(prompt || "")
      .toLowerCase()
      .trim();
    if (!text) return null;

    let best = null;
    let bestScore = 0;

    allEntries().forEach((entry) => {
      let score = 0;
      const q = entry.question.toLowerCase();
      if (text === q || q.includes(text) || text.includes(q.slice(0, 24))) score += 8;
      entry.keys.forEach((key) => {
        if (text.includes(key)) score += key.length > 8 ? 4 : 3;
      });
      // token overlap with question
      text.split(/\W+/).forEach((tok) => {
        if (tok.length > 3 && q.includes(tok)) score += 1;
      });
      if (score > bestScore) {
        bestScore = score;
        best = entry;
      }
    });

    return bestScore >= 3 ? { entry: best, score: bestScore } : null;
  }

  /** Suggested chips for UI (one featured per category + extras) */
  function featuredPrompts(limit) {
    const featured = [];
    SCRIPT.categories.forEach((cat) => {
      if (cat.questions[0]) {
        featured.push({
          category: cat.id,
          label: cat.label,
          question: cat.questions[0].q,
        });
      }
    });
    return featured.slice(0, limit || 10);
  }

  function promptsByCategory(categoryId) {
    const cat = SCRIPT.categories.find((c) => c.id === categoryId);
    if (!cat) return [];
    return cat.questions.map((q) => ({
      category: cat.id,
      label: cat.label,
      question: q.q,
    }));
  }

  global.TechMorahChatScript = {
    SCRIPT,
    allEntries,
    match,
    featuredPrompts,
    promptsByCategory,
    handoff,
  };
})(typeof window !== "undefined" ? window : globalThis);

/**
 * TechMorah Copilot — expert AI/ML advisor + company guide.
 * Works offline on GitHub Pages; calls /chat/ai or api/chat.php when available.
 */
(function () {
  const STORAGE_KEY = "techmorah_chat_session_v2";
  const HISTORY_KEY = "techmorah_chat_history_v2";
  const WA = "+255 655 139 724";
  const EMAIL = "techmorahsolution@gmail.com";
  const HQ = "Dar es Salaam Science Park";

  const PERSONA =
    "I am TechMorah Copilot — an AI and machine-learning advisor with three decades of applied experience across enterprise ML, NLP, computer vision, MLOps, and digital systems. I also represent TechMorah Solution LTD on delivery options for East African businesses.";

  function sessionId() {
    let id = localStorage.getItem(STORAGE_KEY);
    if (!id) {
      id = "tm_" + Math.random().toString(36).slice(2, 12);
      localStorage.setItem(STORAGE_KEY, id);
    }
    return id;
  }

  function loadHistory() {
    try {
      const raw = localStorage.getItem(HISTORY_KEY);
      const list = raw ? JSON.parse(raw) : [];
      return Array.isArray(list) ? list.slice(-12) : [];
    } catch {
      return [];
    }
  }

  function saveHistory(history) {
    localStorage.setItem(HISTORY_KEY, JSON.stringify(history.slice(-12)));
  }

  function handoff() {
    return `For a scoped proposal, WhatsApp ${WA}, email ${EMAIL}, or use the contact form. HQ: ${HQ}.`;
  }

  const KB = [
    {
      id: "greet",
      keys: ["hello", "hi", "hey", "good morning", "good afternoon", "habari", "mambo"],
      reply: () =>
        `${PERSONA}\n\nAsk me about AI/ML strategy, automation, or TechMorah delivery — web & systems, microfinance, e-commerce, ISP management, payment gateways, UI/UX, IT support, and accounting systems.\n\nWhat challenge should we unpack first?`,
    },
    {
      id: "who",
      keys: ["who are you", "your name", "what are you", "copilot", "chatbot"],
      reply: () =>
        `${PERSONA}\n\nI explain options clearly, recommend practical architectures, and route serious engagements to the TechMorah team. ${handoff()}`,
    },
    {
      id: "services",
      keys: ["service", "offer", "what do you do", "catalogue", "capabilities", "what can you"],
      reply: () =>
        `TechMorah Solution LTD delivers:\n1) Web & system design & development\n2) Custom system design & development\n3) Graphic design & UI/UX\n4) IT support\n5) Computerised accounting\n6) Microfinance solutions\n7) E-commerce\n8) ISP management\n9) Payment gateway & integration\n10) Enterprise SMS platforms\n\nWhich line matches your current priority?`,
    },
    {
      id: "ml-strategy",
      keys: ["machine learning", "ml model", "mlops", "train a model", "supervised", "unsupervised", "deep learning", "neural"],
      reply: () =>
        `From an ML practice lens: start with the decision you want improved, then data quality, baseline metrics, and only then model complexity.\n\nTypical TechMorah path:\n• Problem framing & KPI definition\n• Data audit / labelling plan\n• Baseline (rules or simple model)\n• Model choice (classical ML → deep learning only if needed)\n• Evaluation, monitoring, and human-in-the-loop\n• Deployment into Laravel/React or WhatsApp workflows\n\nShare your use case (fraud, churn, support routing, OCR, forecasting) and I will outline a fit-for-purpose stack.`,
    },
    {
      id: "ai-integration",
      keys: ["ai", "artificial intelligence", "openai", "llm", "gpt", "copilot", "chatbot", "nlp", "automation", "rag"],
      reply: () =>
        `For business AI, I recommend a layered approach rather than “drop in a model”:\n1) Capture workflows & failure modes\n2) Choose retrieval (RAG), fine-tuning, or prompt+tools\n3) Guardrails: auth, logging, PII handling, escalation to humans\n4) Embed in web chat, WhatsApp, or internal desks\n\nTechMorah implements AI assistants and automation that respect your existing tools. Tell me the channel (web, WhatsApp, voice) and the job-to-be-done.`,
    },
    {
      id: "cv",
      keys: ["computer vision", "ocr", "image recognition", "object detection", "vision"],
      reply: () =>
        `Computer vision projects succeed when the camera/data pipeline is designed first. I usually sequence: sample capture → labelling guide → baseline detector/classifier → edge vs cloud inference → human review queue.\n\nIf you share the domain (KYC docs, inventory, quality control), I can suggest a pragmatic architecture TechMorah can implement.`,
    },
    {
      id: "data",
      keys: ["dataset", "data quality", "feature", "labelling", "annotation", "bias"],
      reply: () =>
        `Thirty years of pattern: most “AI failures” are data failures. Prioritise:\n• Representative samples across seasons/regions\n• Clear labelling guidelines\n• Train/validation/test separation\n• Drift monitoring after go-live\n\nI can help you draft a data readiness checklist for your project.`,
    },
    {
      id: "microfinance",
      keys: ["microfinance", "mfi", "loan", "savings", "member", "sacco"],
      reply: () =>
        `TechMorah builds microfinance solutions — member onboarding, loans, savings, approvals, and reporting workflows for MFIs and community lenders.\n\nOptional AI layer: risk scoring, document OCR, or collections prioritisation — only after the core ledger workflows are solid.\n\n${handoff()}`,
    },
    {
      id: "ecommerce",
      keys: ["e-commerce", "ecommerce", "shop", "store", "cart", "checkout", "filament"],
      reply: () =>
        `We deliver e-commerce storefronts with catalogue, cart, checkout, CMS, and admin ops (live reference pattern: Active Targets on Laravel + Filament).\n\nAI add-ons that actually help: search ranking, product recommendations, and support bots — after checkout reliability is proven.\n\nWhat catalogue size and payment methods do you need?`,
    },
    {
      id: "isp",
      keys: ["isp", "fibre", "fiber", "internet provider", "subscriber", "billing", "savanna"],
      reply: () =>
        `TechMorah builds ISP management flows — packages, coverage/leads, subscribers, billing, support tickets, and payment journeys (including Savanna Fibre–style digital ops).\n\nUseful ML later: churn prediction, ticket classification, network anomaly alerts.\n\nAre you starting with customer acquisition or back-office billing?`,
    },
    {
      id: "payments",
      keys: ["payment", "gateway", "lipa", "m-pesa", "mpesa", "disbursement", "collection", "mobile money", "ussd", "wakala"],
      reply: () =>
        `TechMorah implements payment gateway & integration work: collections, disbursements, sandboxes, callbacks, reconciliation, and merchant/agent desks (LipaPay-style production patterns).\n\nSecurity first: signed callbacks, idempotent transactions, environment keys, and clear reconciliation reports.\n\nWhich flow do you need — collect, payout, airtime, or agent back office?`,
    },
    {
      id: "sms",
      keys: ["sms", "whatsapp desk", "listener", "bulk message", "sender id", "victoria lush"],
      reply: () =>
        `We deliver enterprise SMS platforms and message desks — portals, templates, sender IDs, and Android Listener-style capture for agent replies.\n\nAI can draft replies and classify intent, but delivery reliability and audit logs come first.\n\n${handoff()}`,
    },
    {
      id: "web",
      keys: ["website", "web", "portal", "laravel", "react", "system design", "dashboard", "crm"],
      reply: () =>
        `Web & system design at TechMorah focuses on secure, scalable Laravel/React (and Flutter where mobile desks help). Delivery flow: discover → design → build & integrate → launch & support.\n\nDescribe users, must-have modules, and hosting preference (Linux VPS or shared).`,
    },
    {
      id: "uiux",
      keys: ["ui", "ux", "design", "brand", "wireframe", "prototype", "graphic"],
      reply: () =>
        `Graphic design & UI/UX at TechMorah covers wireframes, visual systems, and interfaces that hand off cleanly to engineering — so brand impact and usability move together.\n\nShare whether you need a redesign, a design system, or screens for a new product.`,
    },
    {
      id: "support",
      keys: ["support", "it support", "noc", "monitoring", "incident", "helpdesk"],
      reply: () =>
        `IT support covers monitoring, remote assistance, incident handling, and operational continuity so teams stay productive.\n\nTell me how many systems/sites you run and your urgency window.`,
    },
    {
      id: "accounting",
      keys: ["accounting", "finance", "invoice", "receipt", "ledger", "reporting"],
      reply: () =>
        `Computerised accounting solutions streamline financial records, receipts, approvals, and reporting — reducing spreadsheet risk.\n\nIf you also need fee tracking or school/MFI collections, we can scope that as one workflow.`,
    },
    {
      id: "pricing",
      keys: ["price", "pricing", "cost", "quote", "budget", "how much"],
      reply: () =>
        `Pricing depends on scope, integrations, and delivery model (fixed project, phased release, or managed support). AI/ML work is quoted after data readiness and KPI clarity — that prevents wasted spend.\n\nShare modules + timeline and the team will estimate. ${handoff()}`,
    },
    {
      id: "contact",
      keys: ["contact", "whatsapp", "email", "call", "reach", "location", "address", "office"],
      reply: () =>
        `Reach TechMorah:\n• WhatsApp ${WA}\n• Email ${EMAIL}\n• Contact form on the website\n• HQ: ${HQ}\n\nInstagram: TechMorah_Solution`,
    },
    {
      id: "process",
      keys: ["process", "how do you work", "delivery", "timeline", "workshop", "handover"],
      reply: () =>
        `Our delivery rhythm:\n01 Discover & align — goals, users, success metrics\n02 Design the experience — UX + brand source of truth\n03 Build & integrate — APIs, payments, SMS, AI hooks\n04 Launch & support — hosting, training, runbooks\n\nFor AI projects I also insist on an evaluation gate before production traffic.`,
    },
    {
      id: "stack",
      keys: ["stack", "technology", "tech stack", "tools", "framework"],
      reply: () =>
        `Production stack we commonly ship: Laravel, PHP, React, Flutter, Filament, MySQL/SQL Server, REST/Swagger, Twilio/SMS, OpenAI/LLM tooling, Linux VPS, shared hosting, IIS, M-Pesa integrations.\n\nFor ML: Python services, model registries, and API wrappers behind Laravel when the business app must stay stable.`,
    },
  ];

  function scoreEntry(entry, text) {
    let score = 0;
    for (const key of entry.keys) {
      if (text.includes(key)) score += key.length > 6 ? 3 : 2;
    }
    return score;
  }

  function localExpertReply(prompt, history) {
    const text = String(prompt || "").toLowerCase().trim();
    if (!text) {
      return "Ask a concrete question — for example: “Can you build a microfinance system?” or “Do we need RAG or fine-tuning?”";
    }

    // 1) Prefer the official service question script
    if (window.TechMorahChatScript && typeof window.TechMorahChatScript.match === "function") {
      const hit = window.TechMorahChatScript.match(prompt);
      if (hit && hit.score >= 3 && hit.entry) {
        return hit.entry.answer;
      }
    }

    let best = null;
    let bestScore = 0;
    for (const entry of KB) {
      const s = scoreEntry(entry, text);
      if (s > bestScore) {
        bestScore = s;
        best = entry;
      }
    }

    if (best && bestScore > 0) {
      return best.reply();
    }

    const prevUser = [...history].reverse().find((m) => m.role === "user");
    if (prevUser) {
      const prev = String(prevUser.content || "").toLowerCase();
      for (const entry of KB) {
        if (scoreEntry(entry, prev) >= 3 && (text.includes("more") || text.includes("yes") || text.includes("how") || text.includes("next"))) {
          return `${entry.reply()}\n\nIf you share constraints (budget band, timeline, users, data volume), I will narrow this to a first release plan.`;
        }
      }
    }

    return `${PERSONA}\n\nI can advise on AI/ML architecture and TechMorah delivery for microfinance, e-commerce, ISP, payments, SMS, web systems, UI/UX, IT support, and accounting.\n\nTap a suggested question on the left, or ask something specific like “Can you integrate M-Pesa collections?”\n\n${handoff()}`;
  }

  function apiCandidates() {
    const path = window.location.pathname || "";
    const prefix = path.includes("/TechMorah") ? "/TechMorah" : "";
    return [
      `${prefix}/api/chat.php`,
      `${prefix}/chat/ai`,
      "/chat/ai",
      "/api/ai-chat",
      "api/chat.php",
    ];
  }

  async function tryApi(prompt, history) {
    const body = {
      body: prompt,
      message: prompt,
      session_id: sessionId(),
      history: history.slice(-8),
    };
    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute("content");

    for (const url of apiCandidates()) {
      try {
        const res = await fetch(url, {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            ...(csrf ? { "X-CSRF-TOKEN": csrf } : {}),
          },
          body: JSON.stringify(body),
        });
        if (!res.ok) continue;
        const data = await res.json();
        const reply = data.reply || data.response || data.message || data.bot?.body;
        if (typeof reply === "string" && reply.trim()) return reply.trim();
      } catch {
        /* try next */
      }
    }
    return null;
  }

  window.TechMorahChat = {
    sessionId,
    async send(text) {
      const history = loadHistory();
      history.push({ role: "user", content: text });

      // Script answers win for known service questions (consistent on static hosting).
      let reply = null;
      if (window.TechMorahChatScript && typeof window.TechMorahChatScript.match === "function") {
        const hit = window.TechMorahChatScript.match(text);
        if (hit && hit.score >= 4 && hit.entry) {
          reply = hit.entry.answer;
        }
      }

      if (!reply) {
        const apiReply = await tryApi(text, history);
        reply = apiReply || localExpertReply(text, history);
      }

      history.push({ role: "assistant", content: reply });
      saveHistory(history);
      return reply;
    },
    reset() {
      localStorage.removeItem(HISTORY_KEY);
    },
  };

  const chatForm = document.getElementById("chatForm");
  const messageInput = document.getElementById("messageInput");
  const chatMessages = document.getElementById("chatMessages");
  const sendBtn = document.getElementById("chatSendBtn");
  const promptBox = document.getElementById("chatScriptPrompts");
  const categoryBox = document.getElementById("chatScriptCategories");
  if (!chatForm || !messageInput || !chatMessages) return;

  function clearWelcome() {
    const welcome = chatMessages.querySelector("[data-chat-welcome]");
    if (welcome) welcome.remove();
  }

  function appendBubble(text, who) {
    clearWelcome();
    const wrap = document.createElement("div");
    wrap.className = "message-bubble " + (who === "user" ? "user" : "bot");
    wrap.setAttribute("role", "status");
    const parts = String(text).split("\n");
    parts.forEach((line, i) => {
      const p = document.createElement("p");
      p.className = i === parts.length - 1 ? "mb-0" : "mb-2";
      p.textContent = line || "\u00a0";
      wrap.appendChild(p);
    });
    chatMessages.appendChild(wrap);
    chatMessages.scrollTop = chatMessages.scrollHeight;
    return wrap;
  }

  function showTyping() {
    clearWelcome();
    const wrap = document.createElement("div");
    wrap.className = "message-bubble bot is-typing";
    wrap.id = "chatTyping";
    wrap.innerHTML =
      '<span class="typing-dot"></span><span class="typing-dot"></span><span class="typing-dot"></span>';
    chatMessages.appendChild(wrap);
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  function hideTyping() {
    document.getElementById("chatTyping")?.remove();
  }

  async function submitPrompt(text) {
    const prompt = String(text || "").trim();
    if (!prompt) return;
    if (chatForm.dataset.busy === "1") return;
    chatForm.dataset.busy = "1";
    if (sendBtn) sendBtn.disabled = true;
    appendBubble(prompt, "user");
    messageInput.value = "";
    showTyping();
    try {
      const reply = await window.TechMorahChat.send(prompt);
      hideTyping();
      appendBubble(reply, "bot");
    } catch {
      hideTyping();
      appendBubble("Something went wrong momentarily. Please try again, or WhatsApp " + WA + ".", "bot");
    } finally {
      chatForm.dataset.busy = "0";
      if (sendBtn) sendBtn.disabled = false;
      messageInput.focus();
    }
  }

  function bindPromptButtons(root) {
    (root || document).querySelectorAll(".quick-reply").forEach((chip) => {
      if (chip.dataset.bound === "1") return;
      chip.dataset.bound = "1";
      chip.addEventListener("click", () => {
        const text = chip.getAttribute("data-reply") || chip.textContent.trim();
        submitPrompt(text);
      });
    });
  }

  function renderScriptPrompts(categoryId) {
    if (!promptBox || !window.TechMorahChatScript) return;
    const script = window.TechMorahChatScript;
    let items = [];
    if (categoryId && categoryId !== "all") {
      items = script.promptsByCategory(categoryId);
    } else {
      // Show first question from each category + a few high-value extras
      items = script.featuredPrompts(12);
      const payments = script.promptsByCategory("payments");
      if (payments[1]) items.push(payments[1]);
      const ai = script.promptsByCategory("ai");
      if (ai[1]) items.push(ai[1]);
    }
    // de-dupe by question
    const seen = new Set();
    items = items.filter((it) => {
      if (seen.has(it.question)) return false;
      seen.add(it.question);
      return true;
    });

    promptBox.innerHTML = items
      .map(
        (it) =>
          `<button type="button" class="quick-reply" data-reply="${it.question.replace(/"/g, "&quot;")}">${it.question}</button>`
      )
      .join("");
    bindPromptButtons(promptBox);
  }

  function renderCategories() {
    if (!categoryBox || !window.TechMorahChatScript) return;
    const cats = window.TechMorahChatScript.SCRIPT.categories;
    categoryBox.innerHTML =
      `<button type="button" class="tm-chat-cat is-active" data-cat="all">All</button>` +
      cats
        .map((c) => `<button type="button" class="tm-chat-cat" data-cat="${c.id}">${c.label}</button>`)
        .join("");
    categoryBox.querySelectorAll(".tm-chat-cat").forEach((btn) => {
      btn.addEventListener("click", () => {
        categoryBox.querySelectorAll(".tm-chat-cat").forEach((b) => b.classList.remove("is-active"));
        btn.classList.add("is-active");
        renderScriptPrompts(btn.getAttribute("data-cat"));
      });
    });
  }

  renderCategories();
  renderScriptPrompts("all");
  bindPromptButtons(document);

  chatForm.addEventListener("submit", (e) => {
    e.preventDefault();
    submitPrompt(messageInput.value);
  });

  messageInput.addEventListener("keydown", (e) => {
    if (e.key === "Enter" && !e.shiftKey) {
      e.preventDefault();
      submitPrompt(messageInput.value);
    }
  });
})();

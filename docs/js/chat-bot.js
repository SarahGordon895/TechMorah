(function () {
  const STORAGE_KEY = "techmorah_chat_session";

  function sessionId() {
    let id = localStorage.getItem(STORAGE_KEY);
    if (!id) {
      id = "tm_" + Math.random().toString(36).slice(2, 12);
      localStorage.setItem(STORAGE_KEY, id);
    }
    return id;
  }

  function fallbackReply(prompt) {
    const p = prompt.toLowerCase();
    if (p.includes("microfinance") || p.includes("mfi") || p.includes("loan")) {
      return "TechMorah builds microfinance solutions — loan, savings, and member workflows for MFIs and community lenders. Share your process for a clearer next step, or WhatsApp +255 655 139 724.";
    }
    if (p.includes("isp") || p.includes("fibre") || p.includes("fiber") || p.includes("internet")) {
      return "We deliver ISP management platforms — subscriber, billing, support, and payment journeys for internet providers. Tell us your current stack or WhatsApp +255 655 139 724.";
    }
    if (p.includes("e-commerce") || p.includes("ecommerce") || p.includes("shop") || p.includes("store")) {
      return "We build e-commerce storefronts with inventory, checkout, and admin ops — live reference: Active Targets. Ask for a similar engagement via WhatsApp +255 655 139 724.";
    }
    if (p.includes("ai")) {
      return "We embed AI assistants into web and WhatsApp workflows for routing and support. Tell me your current tools and goal, or use the contact form for a scoped proposal.";
    }
    if (p.includes("price") || p.includes("cost")) {
      return "Pricing depends on scope and delivery model (fixed project, phased release, or managed support). Share modules and timeline on the contact page for a practical estimate.";
    }
    if (p.includes("support") || p.includes("hosting") || p.includes("vps") || p.includes("accounting")) {
      return "We provide IT support, computerised accounting solutions, Linux VPS / shared hosting setup, SSL, and documented handover. Describe the environment you need supported.";
    }
    if (p.includes("pay") || p.includes("lipa") || p.includes("m-pesa") || p.includes("gateway") || p.includes("sms")) {
      return "We deliver payment gateway integration, mobile-money collections/disbursements, and enterprise SMS portals. Ask for a similar engagement via WhatsApp +255 655 139 724.";
    }
    if (p.includes("contact") || p.includes("whatsapp")) {
      return "Reach TechMorah on WhatsApp +255 655 139 724, email techmorahsolution@gmail.com, or the contact form. Headquarters: Dar es Salaam Science Park.";
    }
    if (p.includes("website") || p.includes("system") || p.includes("service") || p.includes("design") || p.includes("ui")) {
      return "TechMorah covers ten lines: web & system design, system development, graphic & UI/UX, IT support, computerised accounting, microfinance, e-commerce, ISP management, payment gateways, and enterprise SMS. Which area should we start with?";
    }
    return "I can help with TechMorah services — web & systems, microfinance, e-commerce, ISP management, payment gateways, accounting, UI/UX, and SMS. Ask a specific question or WhatsApp +255 655 139 724 for a human handoff.";
  }

  window.TechMorahChat = {
    async send(text) {
      return fallbackReply(text);
    },
  };

  const chatForm = document.getElementById("chatForm");
  const messageInput = document.getElementById("messageInput");
  const chatMessages = document.getElementById("chatMessages");
  if (!chatForm || !messageInput || !chatMessages) return;

  document.querySelectorAll(".quick-reply").forEach((chip) => {
    chip.addEventListener("click", () => {
      messageInput.value = chip.getAttribute("data-reply") || chip.textContent.trim();
      messageInput.focus();
    });
  });

  function appendBubble(text, who) {
    const wrap = document.createElement("div");
    wrap.className = "chat-bubble chat-bubble--" + who;
    wrap.innerHTML = "<p class=\"mb-0\"></p>";
    wrap.querySelector("p").textContent = text;
    chatMessages.appendChild(wrap);
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  chatForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const text = messageInput.value.trim();
    if (!text) return;
    appendBubble(text, "user");
    messageInput.value = "";
    const reply = await window.TechMorahChat.send(text);
    appendBubble(reply, "bot");
  });
})();

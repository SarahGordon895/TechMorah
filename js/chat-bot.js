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
    if (p.includes("bank") || p.includes("channel") || p.includes("core")) {
      return "TechMorah supports microfinance/core banking configuration, GL mapping reviews, and digital channels (internet, mobile, agency, USSD) within authorised platform scope. Share your stack for a clearer next step, or WhatsApp +255 655 139 724.";
    }
    if (p.includes("ai")) {
      return "We embed AI assistants into web and WhatsApp workflows for routing and support. Tell me your current tools and goal, or use the contact form for a scoped proposal.";
    }
    if (p.includes("price") || p.includes("cost")) {
      return "Pricing depends on scope and delivery model (fixed project, phased release, or managed support). Share modules and timeline on the contact page for a practical estimate.";
    }
    if (p.includes("support") || p.includes("hosting") || p.includes("vps")) {
      return "We provide IT support, monitoring, Linux VPS / shared hosting setup, SSL, and documented handover. Describe the environment you need supported.";
    }
    if (p.includes("pay") || p.includes("lipa") || p.includes("m-pesa") || p.includes("sms")) {
      return "We deliver payment gateways, mobile-money integrations, and enterprise SMS portals — with clear attribution when work was founder/employer delivery. Ask for a similar engagement via WhatsApp +255 655 139 724.";
    }
    if (p.includes("contact") || p.includes("whatsapp")) {
      return "Reach TechMorah on WhatsApp +255 655 139 724, email techmorahsolution@gmail.com, or the contact form. Headquarters: Dar es Salaam Science Park.";
    }
    if (p.includes("website") || p.includes("system") || p.includes("service")) {
      return "TechMorah covers ten lines: core banking, digital channels, payments, e-commerce, custom software, portals, AI, IT support, UI/UX, and hosting. Which area should we start with?";
    }
    return "I can help with TechMorah services — core banking support, channels, payments, SMS, custom systems, and hosting. Ask a specific question or WhatsApp +255 655 139 724 for a human handoff.";
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
      messageInput.value = chip.dataset.reply || "";
      messageInput.focus();
    });
  });

  function pushMessage(text, type) {
    if (chatMessages.querySelector(".text-center.text-muted")) chatMessages.innerHTML = "";
    const wrapper = document.createElement("div");
    wrapper.className = `d-flex mb-3 ${type === "user" ? "justify-content-end" : "justify-content-start"}`;
    const bubble = document.createElement("div");
    bubble.className = `message-bubble ${type}`;
    bubble.textContent = text;
    wrapper.appendChild(bubble);
    chatMessages.appendChild(wrapper);
    chatMessages.scrollTop = chatMessages.scrollHeight;
  }

  function showTyping() {
    const id = `typing-${Date.now()}`;
    const wrapper = document.createElement("div");
    wrapper.className = "d-flex mb-3 justify-content-start";
    wrapper.id = id;
    const bubble = document.createElement("div");
    bubble.className = "message-bubble bot";
    bubble.innerHTML =
      '<span class="typing-dot"></span><span class="typing-dot"></span><span class="typing-dot"></span>';
    wrapper.appendChild(bubble);
    chatMessages.appendChild(wrapper);
    chatMessages.scrollTop = chatMessages.scrollHeight;
    return id;
  }

  chatForm.addEventListener("submit", async (e) => {
    e.preventDefault();
    const text = messageInput.value.trim();
    if (!text) return;
    pushMessage(text, "user");
    messageInput.value = "";
    const typingId = showTyping();
    const reply = await window.TechMorahChat.send(text);
    document.getElementById(typingId)?.remove();
    pushMessage(reply, "bot");
  });
})();

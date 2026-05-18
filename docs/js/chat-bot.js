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
    if (p.includes("ai")) {
      return "We embed AI copilots into WhatsApp, web, and voice flows. Tell me your current system and we'll map the rollout, or tap WhatsApp +255 655 139 724 for a live engineer.";
    }
    if (p.includes("price") || p.includes("cost")) {
      return "Pricing is tailored per scope. Share the modules you need and I can outline options, or use our contact page for an exact quote.";
    }
    if (p.includes("support")) {
      return "Our 24/7 IT support desk routes WhatsApp, FaceTime, and phone into a single timeline with proactive alerts.";
    }
    if (p.includes("account")) {
      return "Computerized accounting bundles Power BI dashboards, approvals, and compliance-ready exports.";
    }
    if (p.includes("website") || p.includes("system")) {
      return "We ship Laravel + React portals, e-commerce, and custom CRMs that inherit your brand. Describe your goal and I'll suggest the best TechMorah squad.";
    }
    return "I'm here to guide you through TechMorah Solution LTD services—AI integration, IT support, accounting automations, and web systems. Ask away or jump to WhatsApp +255 655 139 724.";
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

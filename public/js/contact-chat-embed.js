(function () {
  const form = document.getElementById("contactChatForm");
  const input = document.getElementById("contactChatInput");
  const messages = document.getElementById("contactChatMessages");
  if (!form || !input || !messages) return;

  function fallbackReply(prompt) {
    const p = prompt.toLowerCase();
    if (p.includes("price") || p.includes("cost") || p.includes("quote")) {
      return "Share your scope (SMS, payments, web app, support) and timeline — we reply same day. Use the form below or WhatsApp +255 655 139 724.";
    }
    if (p.includes("sms") || p.includes("victoria")) {
      return "We build enterprise SMS platforms (admin, portals, APIs) — similar to our Victoria Lush delivery. Tell me your messaging volume and we'll suggest architecture.";
    }
    if (p.includes("payment") || p.includes("lipa") || p.includes("m-pesa")) {
      return "We integrate mobile money and payment sandboxes with clear API docs and staging — like LipaPay at iMartGroup. What gateway or bank are you using?";
    }
    if (p.includes("deploy") || p.includes("hosting") || p.includes("vps") || p.includes("server")) {
      return "We deploy to Linux VPS (Victoria Lush production) and shared hosting (iMartGroup LipaPay) with SSL, domains, and handover runbooks. Tell me your stack and host.";
    }
    if (p.includes("support") || p.includes("whatsapp")) {
      return "24/7 support routes through WhatsApp +255 655 139 724, email, and this chat. For urgent issues, WhatsApp is fastest.";
    }
    return "I'm TechMorah's assistant. Ask about web systems, AI, SMS, payments, or IT support — or open the full chat page for a longer session.";
  }

  async function send(text) {
    if (window.TechMorahChat && typeof window.TechMorahChat.send === "function") {
      try {
        return await window.TechMorahChat.send(text);
      } catch {
        return fallbackReply(text);
      }
    }
    return fallbackReply(text);
  }

  function pushMessage(text, type) {
    const empty = messages.querySelector(".contact-chat-empty");
    if (empty) empty.remove();
    const wrap = document.createElement("div");
    wrap.className = `d-flex mb-2 ${type === "user" ? "justify-content-end" : "justify-content-start"}`;
    const bubble = document.createElement("div");
    bubble.className = `message-bubble ${type}`;
    bubble.textContent = text;
    wrap.appendChild(bubble);
    messages.appendChild(wrap);
    messages.scrollTop = messages.scrollHeight;
  }

  document.querySelectorAll(".contact-quick-reply").forEach((chip) => {
    chip.addEventListener("click", () => {
      input.value = chip.dataset.reply || "";
      input.focus();
    });
  });

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const text = input.value.trim();
    if (!text) return;
    pushMessage(text, "user");
    input.value = "";
    input.disabled = true;
    const reply = await send(text);
    pushMessage(reply, "bot");
    input.disabled = false;
    input.focus();
  });
})();

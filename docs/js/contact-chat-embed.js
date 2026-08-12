(function () {
  const form = document.getElementById("contactChatForm");
  const input = document.getElementById("contactChatInput");
  const messages = document.getElementById("contactChatMessages");
  if (!form || !input || !messages) return;

  function fallbackReply(prompt) {
    if (window.TechMorahChat && typeof window.TechMorahChat.send === "function") {
      return null;
    }
    const p = prompt.toLowerCase();
    if (p.includes("price") || p.includes("cost") || p.includes("quote")) {
      return "Share your scope (SMS, payments, web app, support) and timeline — we reply same day. Use the form below or WhatsApp +255 655 139 724.";
    }
    if (p.includes("ai") || p.includes("ml") || p.includes("machine")) {
      return "TechMorah Copilot advises on AI/ML rollout — data readiness, RAG vs fine-tuning, and embedding assistants into web/WhatsApp. Open the full chatbot for a deeper session.";
    }
    if (p.includes("sms") || p.includes("victoria")) {
      return "We build enterprise SMS platforms (admin, portals, APIs). Tell me your messaging volume and we'll suggest architecture.";
    }
    if (p.includes("payment") || p.includes("lipa") || p.includes("m-pesa")) {
      return "We integrate mobile money and payment gateways with clear API docs and staging — like LipaPay at iMartGroup. What gateway or MNO are you using?";
    }
    if (p.includes("isp") || p.includes("fibre") || p.includes("microfinance") || p.includes("e-commerce") || p.includes("ecommerce")) {
      return "We build solutions for microfinance, e-commerce, and ISP management — plus payment gateway integration. Tell me which vertical you need.";
    }
    if (p.includes("deploy") || p.includes("hosting") || p.includes("vps") || p.includes("server")) {
      return "We deploy to Linux VPS and shared hosting with SSL, domains, and handover runbooks. Tell me your stack and host.";
    }
    if (p.includes("support") || p.includes("whatsapp")) {
      return "Support routes through WhatsApp +255 655 139 724, email, and chat. For urgent issues, WhatsApp is fastest.";
    }
    return "I'm TechMorah's assistant. Ask about AI/ML, web systems, SMS, payments, ISP, or IT support — or open the full AI chatbot for a longer session.";
  }

  async function send(text) {
    if (window.TechMorahChat && typeof window.TechMorahChat.send === "function") {
      try {
        return await window.TechMorahChat.send(text);
      } catch {
        /* fall through */
      }
    }
    return fallbackReply(text);
  }

  function pushMessage(text, type) {
    const empty = messages.querySelector(".contact-chat-empty");
    if (empty) empty.remove();
    const bubble = document.createElement("div");
    bubble.className = "message-bubble " + (type === "user" ? "user" : "bot");
    const p = document.createElement("p");
    p.className = "mb-0";
    p.textContent = text;
    bubble.appendChild(p);
    messages.appendChild(bubble);
    messages.scrollTop = messages.scrollHeight;
  }

  form.addEventListener("submit", async (e) => {
    e.preventDefault();
    const text = input.value.trim();
    if (!text) return;
    pushMessage(text, "user");
    input.value = "";
    const reply = await send(text);
    pushMessage(reply || "Please try again, or WhatsApp +255 655 139 724.", "bot");
  });
})();

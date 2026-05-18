(function () {
  const FORMS = document.querySelectorAll("[data-techmorah-contact]");

  function whatsappLink(data) {
    const lines = [
      `Name: ${data.name || "—"}`,
      `Email: ${data.email}`,
      `Phone: ${data.phone || "—"}`,
      data.focus ? `Focus: ${data.focus}` : null,
      `Message: ${data.message}`,
    ].filter(Boolean);
    return `https://wa.me/255655139724?text=${encodeURIComponent(lines.join("\n"))}`;
  }

  async function postFormSubmit(data, subject) {
    return fetch("https://formsubmit.co/ajax/techmorahsolution@gmail.com", {
      method: "POST",
      headers: { "Content-Type": "application/json", Accept: "application/json" },
      body: JSON.stringify({
        name: data.name,
        email: data.email,
        phone: data.phone,
        message: data.message,
        _subject: subject,
        _template: "table",
      }),
    });
  }

  FORMS.forEach((form) => {
    form.addEventListener("submit", async (e) => {
      e.preventDefault();
      const btn = form.querySelector('[type="submit"]');
      const label = btn?.textContent;
      if (btn) {
        btn.disabled = true;
        btn.textContent = "Sending…";
      }

      const focus = form.querySelector('[name="focus"]')?.value?.trim() || "";
      let message = form.querySelector('[name="message"]')?.value?.trim() || "";
      if (focus) message = `[Focus: ${focus}] ${message}`;

      const data = {
        name: form.querySelector('[name="name"]')?.value?.trim() || "",
        email: form.querySelector('[name="email"]')?.value?.trim() || "",
        phone: form.querySelector('[name="phone"]')?.value?.trim() || "",
        focus,
        message,
      };
      const source = form.querySelector('[name="source"]')?.value || "contact";
      const subject =
        source === "consultation" ? "TechMorah consultation request" : "TechMorah contact form";

      let ok = false;
      try {
        const res = await postFormSubmit(data, subject);
        ok = res.ok;
      } catch {
        ok = false;
      }

      if (btn) {
        btn.disabled = false;
        btn.textContent = label || "Send";
      }

      const alertBox = document.getElementById("consultAlert");
      if (ok) {
        if (alertBox) {
          alertBox.className = "alert alert-success";
          alertBox.textContent = "Request received! We will reach out shortly.";
          alertBox.classList.remove("d-none");
        } else {
          alert("Thank you! We received your message and will respond shortly.");
        }
        form.reset();
      } else if (
        confirm("Could not send email from this browser. Open WhatsApp to send your message now?")
      ) {
        window.open(whatsappLink(data), "_blank", "noopener");
      } else if (alertBox) {
        alertBox.className = "alert alert-danger";
        alertBox.textContent = "Unable to send right now. Try WhatsApp or email techmorahsolution@gmail.com.";
        alertBox.classList.remove("d-none");
      }
    });
  });
})();

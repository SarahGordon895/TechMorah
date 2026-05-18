(function () {
  const form = document.getElementById("contactForm");
  const whatsappButton = document.getElementById("whatsappQuickChat");
  if (!form || !whatsappButton) return;

  const updateWhatsAppLink = () => {
    const name = form.querySelector('[name="name"]')?.value?.trim() || "there";
    const email = form.querySelector('[name="email"]')?.value?.trim() || "not provided";
    const phone = form.querySelector('[name="phone"]')?.value?.trim() || "not provided";
    const message =
      form.querySelector('[name="message"]')?.value?.trim() ||
      "I would like to know more about your services.";
    const text = `Hi TechMorah team, my name is ${name}. Email: ${email}. Phone: ${phone}. Message: ${message}`;
    whatsappButton.href = `https://wa.me/255655139724?text=${encodeURIComponent(text)}`;
  };

  form.addEventListener("input", updateWhatsAppLink);
  form.addEventListener("change", updateWhatsAppLink);
  updateWhatsAppLink();
})();

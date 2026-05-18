(function () {
  const form = document.getElementById("newsletterForm");
  if (!form) return;
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    const email = form.querySelector('input[type="email"]')?.value?.trim();
    if (!email) return;
    alert("Thanks for subscribing! We'll send TechMorah updates to " + email + ".");
    form.reset();
  });
})();

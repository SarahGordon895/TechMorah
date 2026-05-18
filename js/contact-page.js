(function () {
  const contactNav = document.getElementById("contactNav");
  const toggler = document.querySelector("#contactNav")?.closest(".navbar")?.querySelector(".navbar-toggler");

  if (contactNav && toggler && typeof bootstrap !== "undefined") {
    const collapse = bootstrap.Collapse.getOrCreateInstance(contactNav, { toggle: false });
    contactNav.querySelectorAll(".nav-link").forEach((link) => {
      link.addEventListener("click", () => {
        if (window.innerWidth < 992 && contactNav.classList.contains("show")) collapse.hide();
      });
    });
  }

  document.querySelectorAll('.contact-page a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener("click", (e) => {
      const id = anchor.getAttribute("href");
      if (!id || id === "#") return;
      const el = document.querySelector(id);
      if (!el) return;
      e.preventDefault();
      el.scrollIntoView({ behavior: "smooth", block: "start" });
      if (contactNav && contactNav.classList.contains("show") && typeof bootstrap !== "undefined") {
        bootstrap.Collapse.getOrCreateInstance(contactNav, { toggle: false }).hide();
      }
    });
  });
})();

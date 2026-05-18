document.addEventListener("DOMContentLoaded", () => {
  const toggler = document.querySelector(".menu-toggle");
  const navMenu = document.getElementById("navMenu");
  if (!toggler || !navMenu || typeof bootstrap === "undefined") return;

  const navCollapse = new bootstrap.Collapse(navMenu, { toggle: false });
  const closeMenu = () => {
    navCollapse.hide();
    toggler.classList.remove("is-active");
    toggler.setAttribute("aria-expanded", "false");
  };

  toggler.addEventListener("click", () => {
    if (navMenu.classList.contains("show")) closeMenu();
    else {
      navCollapse.show();
      toggler.classList.add("is-active");
      toggler.setAttribute("aria-expanded", "true");
    }
  });

  navMenu.querySelectorAll(".nav-link").forEach((link) => {
    link.addEventListener("click", () => {
      if (window.innerWidth < 992 && navMenu.classList.contains("show")) closeMenu();
    });
  });
});

/**
 * TechMorah site scripts — nav drawer, reveal, back-to-top, spinner.
 * No jQuery / Bootstrap Collapse dependency.
 */
(function () {
  const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  function ready(fn) {
    if (document.readyState !== "loading") fn();
    else document.addEventListener("DOMContentLoaded", fn);
  }

  ready(function () {
    const spinner = document.getElementById("spinner");
    if (spinner) {
      setTimeout(function () {
        spinner.classList.remove("show");
        spinner.classList.add("hidden");
      }, prefersReduced ? 0 : 400);
    }

    const toggler = document.querySelector(".menu-toggle");
    const navMenu = document.getElementById("navMenu");

    function setOpen(open) {
      if (!toggler || !navMenu) return;
      navMenu.classList.toggle("show", open);
      navMenu.classList.toggle("is-open", open);
      toggler.classList.toggle("is-active", open);
      toggler.setAttribute("aria-expanded", open ? "true" : "false");
      toggler.setAttribute("aria-label", open ? "Close menu" : "Open menu");
      document.body.style.overflow = open ? "hidden" : "";
    }

    function closeMenu() {
      setOpen(false);
    }

    if (toggler && navMenu) {
      toggler.addEventListener("click", function (e) {
        e.stopPropagation();
        setOpen(!navMenu.classList.contains("show"));
      });
      navMenu.querySelectorAll("a").forEach(function (link) {
        link.addEventListener("click", closeMenu);
      });
      document.addEventListener("click", function (e) {
        if (
          navMenu.classList.contains("show") &&
          !navMenu.contains(e.target) &&
          !toggler.contains(e.target)
        ) {
          closeMenu();
        }
      });
      document.addEventListener("keydown", function (e) {
        if (e.key === "Escape") closeMenu();
      });
    }

    const navHeight = function () {
      const nav = document.getElementById("navbar") || document.querySelector(".navbar");
      return nav ? nav.offsetHeight : 72;
    };

    document.querySelectorAll('a[href^="#"]').forEach(function (anchor) {
      anchor.addEventListener("click", function (e) {
        const href = this.getAttribute("href");
        if (!href || href === "#" || href === "#main-content") return;
        const target = document.querySelector(href);
        if (!target) return;
        e.preventDefault();
        const top = target.getBoundingClientRect().top + window.pageYOffset - navHeight() - 8;
        window.scrollTo({ top: Math.max(0, top), behavior: prefersReduced ? "auto" : "smooth" });
        closeMenu();
      });
    });

    const backToTop = document.getElementById("backToTop") || document.querySelector(".back-to-top");
    if (backToTop) {
      window.addEventListener(
        "scroll",
        function () {
          if (window.pageYOffset > 400) backToTop.classList.add("show");
          else backToTop.classList.remove("show");
        },
        { passive: true }
      );
      backToTop.addEventListener("click", function (e) {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: prefersReduced ? "auto" : "smooth" });
      });
    }

    if (!prefersReduced && "IntersectionObserver" in window) {
      const io = new IntersectionObserver(
        function (entries) {
          entries.forEach(function (entry) {
            if (entry.isIntersecting) {
              entry.target.classList.add("is-visible");
              io.unobserve(entry.target);
            }
          });
        },
        { threshold: 0.12, rootMargin: "0px 0px -40px 0px" }
      );
      document.querySelectorAll(".tm-reveal").forEach(function (el) {
        io.observe(el);
      });
    } else {
      document.querySelectorAll(".tm-reveal").forEach(function (el) {
        el.classList.add("is-visible");
      });
    }
  });
})();

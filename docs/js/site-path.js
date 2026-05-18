/** Resolves asset paths when the site is hosted under a subfolder (e.g. GitHub Pages /TechMorah/docs/). */
(function () {
  const base = document.querySelector("base");
  if (!base || !base.href) return;
  window.TECHMORAH_BASE = base.href;
})();

/**
 * FitStage — the PC layout is the only layout.
 * Phones, tablets, and iPads see the same composition as a computer,
 * scaled to the device. There is no view switcher.
 * TechMorah Solution LTD (https://techmorahsolutionltd.org)
 */
(function (root, factory) {
  if (typeof module === "object" && module.exports) {
    module.exports = factory();
  } else {
    root.FitStage = factory();
  }
})(typeof self !== "undefined" ? self : this, function () {
  "use strict";

  var DEFAULTS = { design: 1280, minScale: 0.25 };

  function cfgFromScript() {
    var script = document.currentScript;
    var out = {};
    if (!script) return out;
    if (script.getAttribute("data-design")) out.design = parseInt(script.getAttribute("data-design"), 10);
    if (script.getAttribute("data-min-scale")) out.minScale = parseFloat(script.getAttribute("data-min-scale"));
    return out;
  }

  function merge(a, b) {
    var o = {};
    var k;
    for (k in DEFAULTS) o[k] = DEFAULTS[k];
    for (k in a) if (a[k] != null) o[k] = a[k];
    for (k in b) if (b[k] != null) o[k] = b[k];
    return o;
  }

  function viewportMeta() {
    var meta = document.querySelector('meta[name="viewport"]');
    if (!meta) {
      meta = document.createElement("meta");
      meta.setAttribute("name", "viewport");
      document.head.insertBefore(meta, document.head.firstChild);
    }
    return meta;
  }

  function apply(opts) {
    try {
      localStorage.removeItem("fitstage-mode");
    } catch (e) {}

    var old = document.getElementById("fitstage-dock");
    if (old && old.parentNode) old.parentNode.removeChild(old);

    var meta = viewportMeta();
    var html = document.documentElement;
    html.setAttribute("data-fitstage", "canvas");
    html.classList.add("fitstage-canvas");
    html.classList.remove("fitstage-reflow");
    meta.setAttribute(
      "content",
      "width=" +
        opts.design +
        ", user-scalable=yes, minimum-scale=" +
        opts.minScale +
        ", maximum-scale=5, viewport-fit=cover"
    );
    return { mode: "canvas", design: opts.design };
  }

  function boot(user) {
    var opts = merge(cfgFromScript(), user || {});
    return apply(opts);
  }

  return {
    boot: boot,
    apply: apply,
    defaults: DEFAULTS,
    state: boot()
  };
});

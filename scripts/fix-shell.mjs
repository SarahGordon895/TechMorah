import fs from "fs";
const p = new URL("./build-static-site.mjs", import.meta.url);
let c = fs.readFileSync(p, "utf8");
const marker = '<motion class="spinner-grow';
const idx = c.indexOf('<div id="spinner"');
const bodyIdx = c.indexOf("${body}", idx);
const before = c.slice(0, idx);
const spinnerEnd = c.indexOf("</motion></div>", idx);
const afterBody = c.slice(bodyIdx);
// find spinner closing - actually use simpler approach
const dupStart = c.indexOf('\n<div class="container-fluid bg-dark py-2 d-none d-md-flex">', idx);
const dupEnd = c.indexOf('\n${body}', dupStart);
if (dupStart > 0 && dupEnd > dupStart) {
  const spinnerBlock = c.slice(idx, dupStart);
  c = before + spinnerBlock + "\n${chrome}\n" + c.slice(dupEnd + 1);
  fs.writeFileSync(p, c);
  console.log("Removed duplicate chrome block");
} else {
  console.log("Pattern not found", dupStart, dupEnd);
}

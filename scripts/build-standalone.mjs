/**
 * Build the framework-free TechMorah site into ../../TechMorah-site
 * Run from Laravel repo: node scripts/build-standalone.mjs
 */
import { spawn } from "child_process";
import path from "path";
import { fileURLToPath } from "url";

const script = path.join(path.dirname(fileURLToPath(import.meta.url)), "build-static-site.mjs");
const child = spawn(process.execPath, [script, "--standalone"], { stdio: "inherit", shell: true });
child.on("exit", (code) => process.exit(code ?? 0));

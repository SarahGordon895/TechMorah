# TechMorah Solution LTD (Laravel)

AI & IT solutions company site — **Laravel** application (Blade, Vite, MySQL).

## Live website (GitHub Pages)

The public **HTML / CSS / JavaScript** site is in [`docs/`](docs/).

### Enable Pages (required once)

1. Open **https://github.com/SarahGordon895/TechMorah/settings/pages**
2. **Build and deployment** → Source: **Deploy from a branch**
3. Branch: **`main`** → Folder: **`/docs`** → **Save**
4. Wait 1–3 minutes, then open: **https://sarahgordon895.github.io/TechMorah/**

If you see a 404 or only this README, the folder is still set to `/ (root)` — switch it to **`/docs`**.

## Local static preview

`http://localhost/personal%20projects/_screenshot-cache/TechMorah/docs/`

Rebuild after editing Blade views:

```bash
node scripts/build-static-site.mjs --no-php
```

## Standalone copy (optional)

A separate folder copy lives at `../TechMorah-site/` (sibling under `personal projects`). Rebuild with:

```bash
node scripts/build-standalone.mjs
```

## Run Laravel locally

1. Copy `.env.example` to `.env`
2. `composer install`
3. `php artisan serve`

# Deployment & Testing TODO

## 1. [FAILED - OPTIONAL] Pest Install

- Conflicts (PHP 8.2, collision ^8.6, phpunit ^11). Keep PHPUnit or upgrade PHP/collision.

## 2. [DONE] Production Prep ✅

- `npm run build` ✅
- `php artisan config:cache` ✅
- `php artisan route:cache` ✅
- `php artisan view:cache` ✅
- `php artisan optimize` ✅

## 3. [PENDING] Deploy Render.com FREE HOSTING

| Setting   | Value                                                                                          |
| --------- | ---------------------------------------------------------------------------------------------- |
| Build Cmd | `composer install --no-dev --optimize-autoloader && npm ci --only=production && npm run build` |
| Start Cmd | `php artisan serve --host=0.0.0.0 --port=$PORT`                                                |
| Instance  | Free                                                                                           |
| DB        | PostgreSQL (free tier)                                                                         |

Steps:

- Go https://render.com → Connect GitHub → jabarco7/my_portfolio
- Add Postgres service
- Copy .env vars (generate APP_KEY if needed)
- Deploy!

## 4. [DONE] Git Repo Ready: https://github.com/jabarco7/my_portfolio

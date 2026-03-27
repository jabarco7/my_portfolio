# FREE Render.com Deployment Guide

## Quick Deploy (Tested for your repo)

Repo: https://github.com/jabarco7/my_portfolio

1. **render.com** → New Web Service → GitHub → your repo → **Connect**

2. **Edit Service**:

    ```
    Build Command: composer install --no-dev --optimize-autoloader && npm ci && npm run build
    Start Command: php artisan serve --host=0.0.0.0 --port=$PORT
    Instance: Free
    ```

3. **Database**: New → PostgreSQL → Free → Attach to service

4. **Environment** (copy from .env, update DB):

    ```
    APP_NAME=MyPortfolio
    APP_ENV=production
    APP_DEBUG=false
    APP_KEY=base64:... # php artisan key:generate --show
    DB_CONNECTION=pgsql
    DB_HOST=${DB_HOST from Render}
    DB_PORT=5432
    DB_DATABASE=${DB_NAME}
    DB_USERNAME=${DB_USER}
    DB_PASSWORD=${DB_PASSWORD}
    SESSION_DRIVER=database  # or file
    CACHE_DRIVER=file
    QUEUE_CONNECTION=sync
    ```

5. **Deploy** → Manual Deploy → Logs watch build/migrate.

**URL**: https://your-app.onrender.com (sleeps idle, free 750hrs/mo)

**Fix Render failures**:

- No cached bootstrap files issue → Use `--no-cache` first deploy? Or correct start cmd.
- DB migrate: Add Build Script `php artisan migrate --force`

Local test: `npm run build && php artisan config:cache && php artisan serve`

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 🚀 FREE HOSTING READY - Render.com

Your Laravel portfolio is optimized for **free deployment**!

### Deploy Steps (5 mins):
1. [Render.com](https://render.com) → New **Web Service** → GitHub `jabarco7/my_portfolio`
2. **Build Command**:
   ```
   composer install --no-dev --optimize-autoloader && npm ci && npm run build
   ```
3. **Start Command**:
   ```
   php artisan serve --host=0.0.0.0 --port=$PORT
   ```
4. **Free PostgreSQL** DB + copy `.env` vars (APP_KEY, DB_*)
5. **LIVE URL**: `https://your-app.onrender.com`

### Local Setup
```bash
composer install
npm install
php artisan key:generate
php artisan migrate
php artisan db:seed
npm run dev
php artisan serve
```

Admin: `/admin/login`

**Production optimized** - ready to deploy!

## Learning Laravel
[...rest unchanged...]

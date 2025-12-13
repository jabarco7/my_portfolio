# Deployment Guide

## 1. Server Requirements
- PHP 8.2+
- Composer
- Node.js & NPM
- MySQL 8.0+ or PostgreSQL
- Nginx or Apache

## 2. Initial Setup
1. Clone the repository.
2. Run `composer install --optimize-autoloader --no-dev`.
3. Run `npm ci && npm run build`.
4. Copy `.env.example` to `.env` and configure database/mail settings.
5. Run `php artisan key:generate`.
6. Run `php artisan migrate --seed`.
7. Run `php artisan storage:link`.

## 3. Production Configuration
- Set `APP_ENV=production`.
- Set `APP_DEBUG=false`.
- Set `DEBUGBAR_ENABLED=false` (if installed).
- Configure `CACHE_DRIVER=redis` or `file`.
- Configure `QUEUE_CONNECTION=database` or `redis`.
- Configure `SESSION_DRIVER=redis` or `file`.

## 4. Optimization
- Run `php artisan config:cache`.
- Run `php artisan route:cache`.
- Run `php artisan view:cache`.
- Run `php artisan event:cache`.

## 5. Web Server Configuration (Nginx Example)
```nginx
server {
    listen 80;
    server_name example.com;
    root /var/www/my_portfolio/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

## 6. SSL/TLS
- Use Certbot to obtain a free Let's Encrypt certificate:
  `sudo certbot --nginx -d example.com`

## 7. Maintenance
- Set up a cron job for Laravel scheduler:
  `* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1`

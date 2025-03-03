#!/bin/sh

# Tunggu database MySQL siap
echo "Menunggu database MySQL..."
while ! nc -z db 3306; do
  sleep 1
  echo "Menunggu database MySQL..."
done
echo "Database MySQL siap!"

# Install dependency Laravel
composer install --no-interaction --optimize-autoloader

# Copy .env-example jadi .env kalau belum ada
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Generate key Laravel
php artisan key:generate
php artisan config:clear
php artisan config:cache

# Migrate dan seed database
php artisan migrate --force
#php artisan db:seed --force

# Beri permission storage & cache
chmod -R 777 storage bootstrap/cache

rm -rf node_modules package-lock.json
npm install
npm run build
# npm install --save-dev vite
# ./node_modules/.bin/vite build

# Jalankan PHP-FPM
exec php-fpm

#!/bin/sh

# echo "installing composer"
# Install dependency Laravel
# composer install --no-interaction --optimize-autoloader

# echo "build node modules"
# rm -rf node_modules package-lock.json
# npm ci
# npm run build
# npm install --save-dev vite
# ./node_modules/.bin/vite build

# Copy .env-example jadi .env kalau belum ada
if [ ! -f .env ]; then
    cp .env.example .env
fi

# Tunggu database MySQL siap
echo "Menunggu database MySQL..."
while ! nc -z db 3306; do
  sleep 1
  echo "Menunggu database MySQL..."
done
echo "Database MySQL siap!"
# Generate key Laravel
php artisan key:generate

# Migrate dan seed database
php artisan migrate --force
#php artisan db:seed --force

# Beri permission storage & cache
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

uvicorn rekomendasi:app --host 0.0.0.0 --port 7000 --reload &

# Jalankan PHP-FPM
exec php-fpm

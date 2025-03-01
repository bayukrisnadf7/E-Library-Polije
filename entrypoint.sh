#!/bin/sh

# Tunggu database siap
echo "Menunggu database..."
until nc -z -v -w30 db 3306
do
  echo "Database belum siap. Menunggu..."
  sleep 5
done
echo "Database siap!"

# Copy .env.example jadi .env kalau belum ada
if [ ! -f ".env" ]; then
  echo "Membuat .env dari .env.example"
  cp .env.example .env
fi

# Generate key Laravel
php artisan key:generate

# Jalankan migration & seeder
php artisan migrate --force
php artisan db:seed --force

# Jalankan queue worker (opsional, kalau pakai queue)
php artisan queue:work &

# Start PHP-FPM
exec "$@"

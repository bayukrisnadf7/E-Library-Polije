#!/bin/sh

# Tunggu MySQL siap
echo "Menunggu MySQL..."
until nc -z -v -w30 db 3306; do
  echo "Menunggu database..."
  sleep 5
done
echo "Database siap!"

# Copy .env jika belum ada
if [ ! -f ".env" ]; then
  cp .env.example .env
  echo "File .env dibuat dari .env.example"
fi

# Generate app key
php artisan key:generate

# Jalankan migration & seeder
php artisan migrate --force
php artisan db:seed --force

# Jalankan PHP-FPM
exec "$@"

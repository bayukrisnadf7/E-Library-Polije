# Pakai base image PHP 8.4 + Nginx
FROM php:8.4-fpm

# Install dependensi tambahan (MySQL, unzip, dll.)
RUN apt-get update && apt-get install -y \
    nginx \
    zip \
    unzip \
    git \
    curl \
    mariadb-client \
    && docker-php-ext-install pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy semua file Laravel ke dalam container
COPY . .

# Copy default Nginx config
COPY ./nginx/default.conf /etc/nginx/conf.d/default.conf

# Beri permission ke storage & bootstrap cache
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage \
    && chmod -R 775 /var/www/html/bootstrap/cache

# Copy .env-example jadi .env
RUN cp .env.example .env

# Install dependencies Laravel
RUN composer install --no-dev --optimize-autoloader

# Generate APP_KEY
RUN php artisan key:generate

# Jalankan migrasi & seeder (jika ada)
RUN php artisan migrate --force

# Jalankan supervisor buat worker queue (opsional)
RUN apt-get install -y supervisor && \
    echo "[program:laravel-worker]
command=php /var/www/html/artisan queue:work --tries=3
autostart=true
autorestart=true
user=www-data
numprocs=1
redirect_stderr=true
stdout_logfile=/var/www/html/storage/logs/worker.log" > /etc/supervisor/conf.d/laravel-worker.conf

# Expose port 80 buat Nginx
EXPOSE 80

# Jalankan Nginx & PHP-FPM
CMD service nginx start && php-fpm

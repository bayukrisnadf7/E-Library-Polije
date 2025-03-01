# Pakai PHP 8.4 dengan FPM
FROM php:8.4-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl libpng-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set workdir ke /var/www/html
WORKDIR /var/www/html

# Copy semua file Laravel ke dalam container
COPY . .

# Set file permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy env file
RUN cp .env.example .env

# Install dependency Laravel & generate key
RUN composer install --no-dev --optimize-autoloader \
    && php artisan key:generate

# Migrate database dan seeding (otomatis)
RUN php artisan migrate --force && php artisan db:seed --force

# Jalankan PHP-FPM
CMD ["php-fpm"]

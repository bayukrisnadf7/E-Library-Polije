# Gunakan base image PHP 8.4 dengan FPM
FROM php:8.4-fpm

# Install dependensi yang diperlukan
RUN apt-get update && apt-get install -y \
    composer \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Set working directory
WORKDIR /var/www

# Copy semua file Laravel ke dalam container
COPY . .

# Copy file konfigurasi entrypoint
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Jalankan entrypoint saat container mulai
ENTRYPOINT ["/entrypoint.sh"]

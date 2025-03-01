# Pakai PHP 8.4 dengan FPM
FROM php:8.4-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    git \
    curl \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer dari source resmi
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory di dalam container
WORKDIR /var/www

# Copy semua file Laravel ke dalam container
COPY . .

# Set permission agar storage dan cache bisa diakses Laravel
RUN chmod -R 777 storage bootstrap/cache

# Copy entrypoint script & kasih izin execute
COPY ./entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

# Expose port PHP-FPM
EXPOSE 9000

# Gunakan entrypoint script
ENTRYPOINT ["/entrypoint.sh"]

# Default command (PHP-FPM)
CMD ["php-fpm"]

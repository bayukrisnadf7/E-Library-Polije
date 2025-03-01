# Gunakan base image PHP-FPM 8.4 dengan ekstensi yang dibutuhkan
FROM php:8.4-fpm

# Install dependensi yang diperlukan
RUN apt-get update && apt-get install -y \
    netcat-openbsd \
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

# Install Composer dari source resminya
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set workdir ke dalam folder project Laravel
WORKDIR /var/www

# Copy semua file ke dalam container
COPY . .

# Beri permission ke storage dan bootstrap/cache agar bisa ditulis
RUN chmod -R 777 storage bootstrap/cache

# Install Node.js dan npm
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs && \
    npm cache clean --force && \
    rm -rf node_modules package-lock.json && \
    npm install && \
    npm install --save-dev vite && \
    npm rebuild esbuild && \
    npm run build

# Copy entrypoint.sh ke root container dan beri izin eksekusi
COPY entrypoint.sh ./entrypoint.sh
RUN chmod +x ./entrypoint.sh

# Jalankan entrypoint script
ENTRYPOINT ["/bin/sh", "./entrypoint.sh"]

# Dùng FrankenPHP PHP 8.2
FROM dunglas/frankenphp:php8.2.29-bookworm

# Cài các PHP extensions cần cho Laravel + Voyager
RUN install-php-extensions \
    gd \
    pdo_mysql \
    exif \
    fileinfo \
    zip \
    intl

# Set working directory
WORKDIR /app

# Copy composer files
COPY composer.json composer.lock ./

# Cài composer packages
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Copy package files
COPY package.json package-lock.json ./

# Cài Node dependencies
RUN npm ci --omit=dev

# Copy toàn bộ code
COPY . .

# Build assets (Vite)
RUN npm run build

# Tạo storage link và cache config
RUN php artisan storage:link || true
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Mở port
EXPOSE 8000

# Lệnh chạy server FrankenPHP
CMD ["frankenphp", "php-server", "public/index.php", "--port", "8000"]

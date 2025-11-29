# -----------------------------------------------------
# 1) Builder stage: install PHP extensions + composer
# -----------------------------------------------------
FROM dunglas/frankenphp AS builder

# Install system packages + composer
RUN apt-get update && apt-get install -y \
    curl \
    zip unzip git \
    libpng-dev libjpeg-dev libfreetype6-dev libwebp-dev && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable GD extension
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd

# Copy composer files
WORKDIR /app
COPY composer.json composer.lock ./

# Install composer dependencies (no dev)
RUN composer install --no-dev --optimize-autoloader --no-interaction

# -----------------------------------------------------
# 2) Production stage
# -----------------------------------------------------
FROM dunglas/frankenphp

WORKDIR /app

# Copy full source
COPY . .

# Copy vendor from builder
COPY --from=builder /app/vendor /app/vendor

# Permissions
RUN mkdir -p storage bootstrap/cache && chmod -R 777 storage bootstrap/cache

# Expose port
EXPOSE 8080

# Start server
CMD ["frankenphp", "php-server", "public/index.php", "--port", "8080"]

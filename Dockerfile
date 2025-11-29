# Phase 1: Build PHP extensions + composer dependencies
FROM dunglas/frankenphp as builder

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libwebp-dev \
    zip unzip git

# Enable GD
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd

# Install composer dependencies
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Phase 2: Production image
FROM dunglas/frankenphp

# Copy code
COPY . /app

# Copy vendor
COPY --from=builder /app/vendor /app/vendor

# Permissions
RUN mkdir -p storage bootstrap/cache && chmod -R 777 storage bootstrap/cache

CMD ["frankenphp", "php-server", "public/index.php", "--port", "8080"]

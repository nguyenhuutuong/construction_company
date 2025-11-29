# -----------------------------------------------------
# 1) Builder stage (có composer + GD + ext)
# -----------------------------------------------------
FROM dunglas/frankenphp AS builder

RUN apt-get update && apt-get install -y \
    curl zip unzip git \
    libpng-dev libjpeg-dev libfreetype6-dev libwebp-dev \
    && curl -sS https://getcomposer.org/installer \
       | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction

# -----------------------------------------------------
# 2) Production stage
# -----------------------------------------------------
FROM dunglas/frankenphp

RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev libwebp-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install gd

WORKDIR /app

COPY . .
COPY --from=builder /app/vendor /app/vendor

RUN mkdir -p storage bootstrap/cache && chmod -R 777 storage bootstrap/cache

EXPOSE 8080
CMD ["frankenphp", "php-server", "public/index.php", "--port", "8080"]

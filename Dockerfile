# Stage 1: Build stage dengan PHP dan Node.js
FROM php:8.2-fpm-alpine

# Install dependencies
RUN apk add --no-cache \
    curl \
    zip \
    unzip \
    git \
    npm \
    nodejs \
    build-base \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    supervisor \
    netcat-openbsd

# Install PHP extensionsasas
RUN docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy composer files
COPY composer.json composer.lock* ./

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-scripts

# Copy package files
COPY package.json package-lock.json* ./

# Install Node dependencies
RUN npm ci

# Copy application files
COPY . .

# Run Laravel post-install commands
RUN composer run-script post-autoload-dump

# Build frontend assets
RUN npm run build

# Create storage directories and set permissions
RUN mkdir -p storage/logs bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache public

# Copy entrypoint script
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Expose port
EXPOSE 8000

# Health check
HEALTHCHECK --interval=30s --timeout=10s --start-period=5s --retries=3 \
    CMD php -r "exit(file_exists('/app/public/index.php') ? 0 : 1);"

# Run entrypoint
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

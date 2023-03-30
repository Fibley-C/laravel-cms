# Base image
FROM php:8.1-fpm

RUN usermod -u 1000 www-data

# Setup node js source will be used later to install node js
RUN curl -sL https://deb.nodesource.com/setup_19.x -o nodesource_setup.sh
RUN ["sh",  "./nodesource_setup.sh"]

# Install dependencies
RUN apt-get update && apt-get install -y \
    curl \
    git \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nginx \
    nodejs \
    supervisor

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql exif pcntl bcmath gd opcache

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY --chown=www-data . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# RUN php artisan cache:clear
# RUN php artisan config:clear

RUN chmod -R 755 /var/www/html/storage
RUN chmod -R 755 /var/www/html/bootstrap

# Install dependencies
# For production
# RUN composer install --no-dev --prefer-dist --optimize-autoloader --no-scripts --no-progress
RUN composer install -no-scripts --no-progress

# Build assets
RUN npm ci
RUN npm run build

# Copy Nginx configuration
COPY docker/nginx.conf /etc/nginx/conf.d/default.conf

# Copy Supervisor configuration
COPY docker/supervisord.conf /etc/supervisord.conf

# Start Supervisor
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]

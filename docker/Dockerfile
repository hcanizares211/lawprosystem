FROM php:7.4-apache

# Dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libonig-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql mbstring zip exif

# Apache rewrite
RUN a2enmod rewrite

# VirtualHost
COPY docker/vhost.conf /etc/apache2/sites-available/000-default.conf

# Usar Composer 2 directamente desde la imagen oficial
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

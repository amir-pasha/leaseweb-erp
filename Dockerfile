FROM php:8-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libonig-dev \
        libssl-dev \
        libzip-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app

EXPOSE 80


    FROM php:5.6.40-apache

    WORKDIR /app

    RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli


    FROM php:7.4-apache

    WORKDIR /app

    RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

    COPY . . 

    CMD ["php", "-S", "localhost:8080"]


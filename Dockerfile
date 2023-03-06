    FROM 8.0.27-apache

    WORKDIR /controller/model/view

    RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

    COPY . . 
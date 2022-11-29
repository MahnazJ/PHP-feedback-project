FROM php:8.1-apache

WORKDIR /var/www/html

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN chown -R www-data:www-data /var/www

RUN adduser --disabled-password --gecos '' developer

RUN chown -R developer:www-data /var/www

RUN chmod 755 /var/www

USER developer


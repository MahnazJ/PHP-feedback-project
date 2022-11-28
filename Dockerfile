FROM php:8.1-apache

WORKDIR /var/www/html


RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN chown -R www-data:www-data /var/www

# Create a new user
RUN adduser --disabled-password --gecos '' developer

# Add user to the group
RUN chown -R developer:www-data /var/www

RUN chmod 755 /var/www

# Switch to this user
USER developer

# FROM php:7.2-apache
# COPY . /var/www/html/
# RUN chown -R www-data:www-data /var/www
# RUN docker-php-ext-install mysqli pdo pdo_mysql

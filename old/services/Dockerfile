# Use the official PHP Apache image as the base image
FROM php:apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy custom php.ini to the container
COPY php.ini /usr/local/etc/php/conf.d/

# Set the working directory
WORKDIR /var/www/html
# Gunakan image PHP
FROM php:7.4-apache

# Copy source code ke container
COPY ./src /var/www/html

# Install ekstensi PHP
RUN docker-php-ext-install mysqli

# Expose port
EXPOSE 80

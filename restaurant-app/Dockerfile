
# Use official PHP image with Apache
FROM php:8.4-apache

WORKDIR /var/www/html

# Install PHP extensions needed for SQLite (pdo_sqlite only)
RUN apt-get update && apt-get install -y \
    libsqlite3-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo_sqlite

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy project files
COPY . .

# Set permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80

CMD ["apache2-foreground"]
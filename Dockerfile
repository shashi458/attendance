# Use PHP with Apache
FROM php:8.2-apache

# Enable required PHP extensions
RUN apt-get update && apt-get install -y \
    libonig-dev libzip-dev unzip git curl \
    && docker-php-ext-install pdo pdo_mysql mbstring zip exif pcntl bcmath

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy project files
WORKDIR /var/www/html
COPY . .

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Set Laravel permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]

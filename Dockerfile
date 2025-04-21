FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    libzip-dev \
    libonig-dev \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www/html

# Copy existing application directory contents
COPY . /var/www/html/

# List directory contents to debug
RUN ls -la /var/www/html/

# Make artisan executable (if it exists)
RUN if [ -f "/var/www/html/artisan" ]; then chmod +x /var/www/html/artisan; fi

# Install composer dependencies
RUN if [ -f "/var/www/html/composer.json" ]; then composer install --optimize-autoloader --no-dev; fi

# Install Node.js packages and build assets
RUN if [ -f "/var/www/html/package.json" ]; then npm install && npm run build; fi

# Expose port 8000
EXPOSE 8000

# Use a script to debug and then start
CMD ["sh", "-c", "ls -la /var/www/html && echo 'Current directory:' && pwd && if [ -f artisan ]; then php artisan serve --host=0.0.0.0 --port=8000; else echo 'Artisan file not found'; fi"]
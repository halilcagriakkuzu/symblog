FROM php:8.0-fpm

# Set working directory
WORKDIR /var/www


# To install zip git nano unzip curl packages
RUN apt-get update && apt-get install -y \
    zip \
    nano \
    unzip \
    git \
    curl

# To install nodejs - npm and yarn
RUN apt-get update && apt-get install -y \
    software-properties-common \
    npm
RUN npm install npm@latest -g && \
    npm install n -g && \
    n latest
RUN npm install --global yarn

# Install xDebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

# Install OPCache
RUN docker-php-ext-install opcache

# Install Intl
RUN apt-get update && apt-get install -y zlib1g-dev libicu-dev g++
RUN docker-php-ext-configure intl
RUN docker-php-ext-install intl

# Install APCu
RUN pecl install apcu \
        && docker-php-ext-enable apcu \
        && pecl clear-cache

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www:www . /var/www

# Change current user to www
USER www

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]

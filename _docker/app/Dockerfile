#
#--------------------------------------------------------------------------
# Image Setup
#--------------------------------------------------------------------------
#

FROM php:8.1-fpm

# Set Environment Variables
ENV DEBIAN_FRONTEND noninteractive

#
#--------------------------------------------------------------------------
# Software's Installation
#--------------------------------------------------------------------------
#
# Installing tools and PHP extentions using "apt", "docker-php", "pecl",
#

# Install "curl", "libmemcached-dev", "libpq-dev", "libjpeg-dev",
#         "libpng-dev", "libfreetype6-dev", "libssl-dev", "libmcrypt-dev",
RUN set -eux; \
    apt-get update; \
    apt-get upgrade -y; \
    apt-get install -y --no-install-recommends \
            curl \
            libmemcached-dev \
            libz-dev \
            libpq-dev \
            libjpeg-dev \
            libpng-dev \
            libfreetype6-dev \
            libssl-dev \
            libwebp-dev \
            libxpm-dev \
            libmcrypt-dev \
            libonig-dev; \
    rm -rf /var/lib/apt/lists/*

RUN set -eux; \
    # Install the PHP pdo_mysql extention
    docker-php-ext-install pdo_mysql; \
    # Install the PHP pdo_pgsql extention
    docker-php-ext-install pdo_pgsql; \
    # Install the PHP gd library
    docker-php-ext-configure gd \
            --prefix=/usr \
            --with-jpeg \
            --with-webp \
            --with-xpm \
            --with-freetype; \
    docker-php-ext-install gd; \
    php -r 'var_dump(gd_info());'
#FROM php:8.0-fpm
#
#RUN apt-get update && apt-get install -y \
#       apt-utils \
#       libpq-dev \
#       libpng-dev \
#       libzip-dev \
#       zip unzip \
#       git && \
#       /usr/local/bin/docker-php-ext-install pdo_mysql && \
#       /usr/local/bin/docker-php-ext-install bcmath && \
#       /usr/local/bin/docker-php-ext-install gd && \
#       /usr/local/bin/docker-php-ext-install zip && \
#       /usr/local/bin/docker-php-ext-install pdo_pgsql && \
#       apt-get clean && \
#       rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*
#
#COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini
#
## Install composer
#ENV COMPOSER_ALLOW_SUPERUSER=1
#RUN curl -sS https://getcomposer.org/installer | php -- \
#     --filename=composer \
#     --install-dir=/usr/local/bin
#
#WORKDIR /var/www

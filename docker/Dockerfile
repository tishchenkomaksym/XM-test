FROM php:7.4-apache

COPY docker/apache2/host.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        graphviz \
&& apt-get update && apt-get install mariadb-client -y git -y zip\
    && docker-php-ext-install pdo_mysql mbstring bcmath mysqli zip gd && pecl install xdebug \
            && docker-php-ext-enable xdebug  && chmod -R 777 /var/www/ \

  && apt-get update && apt-get install -y \
    libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && apt -y install supervisor \

&& pecl install redis  && docker-php-ext-enable redis.so \

&& a2enmod rewrite \

# Handling images

&& apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install exif\
    && docker-php-ext-install mbstring \
&& service apache2 restart

RUN apt-get update && apt-get install -y cron


WORKDIR /var/www/html

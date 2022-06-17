FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
    libxml2-dev \
    libcurl4-gnutls-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmemcached-dev \
    libonig-dev \
    locales \
    dialog \
    apt-utils \
    locales  \
    locales-all \
    libwebp-dev \
    libpng-dev  \
    libxpm-dev \
    supervisor \
    libzip-dev \
    zlib1g-dev  \
    unzip

RUN docker-php-ext-install pdo pdo_mysql opcache intl exif
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install xml
RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/
RUN docker-php-ext-install gd
RUN docker-php-ext-install soap
RUN docker-php-ext-install pcntl
RUN docker-php-ext-install zip

RUN docker-php-ext-enable gd zip pcntl

RUN pecl install -f xdebug && \
    docker-php-ext-enable xdebug

RUN echo ipv4 >> ~/.curlrc && \
    curl -v -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    echo "Done" \

ENV LC_ALL de_CH.UTF-8
ENV LANG de_CH.UTF-8
ENV LANGUAGE de_CH.UTF-8

COPY ./etc /usr/local/etc

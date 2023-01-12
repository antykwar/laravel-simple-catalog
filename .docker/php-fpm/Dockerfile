FROM php:8.2-fpm-alpine

ARG CONTAINER_USER_ID
ARG CONTAINER_GROUP_ID

WORKDIR /app

RUN apk add --no-cache $PHPIZE_DEPS \
    && docker-php-ext-install opcache

RUN apk add --update --no-cache linux-headers \
    && pecl install xdebug-3.2.0 \
    && docker-php-ext-enable xdebug

RUN apk add --no-cache redis

RUN apk add oniguruma-dev postgresql-dev libzip-dev libxml2-dev \
    && docker-php-ext-install bcmath ctype fileinfo mbstring pdo pdo_pgsql xml zip intl

RUN pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

USER $CONTAINER_USER_ID:$CONTAINER_GROUP_ID

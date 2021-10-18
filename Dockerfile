FROM php:8.0-fpm

ADD . /app

RUN apt update \
    && apt install --yes zip unzip \
    && curl -sq 'https://getcomposer.org/download/2.1.9/composer.phar' -o /bin/composer \
    && chmod +x /bin/composer \
    && composer install --working-dir=/app

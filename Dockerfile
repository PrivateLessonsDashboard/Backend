FROM php:8.3

RUN apt-get update -y && apt-get install -y \
    curl \
    zip \
    unzip \
  && docker-php-ext-install pdo pdo_mysql

USER root

WORKDIR /var/www/html
COPY . .
COPY --from=composer:2.7.1 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN composer i --no-interaction --no-progress
RUN cd public && ln -sf ../storage/app/public/ storage

ENV PORT=9000

CMD "./entrypoint.sh"

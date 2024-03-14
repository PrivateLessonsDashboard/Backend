FROM php:8.3-fpm

# Copy configs
COPY docker/php.ini /usr/local/etc/php/
COPY docker/docker.conf /usr/local/etc/php-fpm.d/docker.conf
COPY docker/.bashrc /root/

# Linux Packages
RUN apt-get update \
  && apt-get install -y build-essential zlib1g-dev default-mysql-client curl gnupg procps vim git unzip libzip-dev libpq-dev \
  && docker-php-ext-install zip pdo_mysql

RUN apt-get install -y libicu-dev \
&& docker-php-ext-configure intl \
&& docker-php-ext-install intl

# pcov
RUN pecl install pcov && docker-php-ext-enable pcov

# Xdebug
# RUN pecl install xdebug \
# && docker-docker-ext-enable xdebug \
# && echo ";zend_extension=xdebug" > /usr/local/etc/docker/conf.d/docker-docker-ext-xdebug.ini

# Composer
COPY --from=composer:2.7 /usr/bin/composer /usr/local/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

RUN composer config --global process-timeout 3600

# Dir Colors
WORKDIR /root
RUN git clone https://github.com/seebi/dircolors-solarized

# Main Laravel Dir
WORKDIR /var/www

COPY . .

RUN chown -R www-data:www-data * && composer i && php artisan key:generate

EXPOSE 5173

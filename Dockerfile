FROM php:8.3-fpm

RUN mkdir -p /var/www/
WORKDIR /var/www/

COPY . /var/www/

RUN apt-get update
RUN apt-get install libzip-dev libcurl3-dev libpq-dev -y
RUN docker-php-ext-configure zip \
  && docker-php-ext-install zip pdo pdo_pgsql curl

RUN chown -R www-data /var/www/

USER www-data

COPY --from=composer:2.7 /usr/bin/composer /usr/local/bin/composer

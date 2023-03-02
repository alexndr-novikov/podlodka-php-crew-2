FROM php:8.1 as builder

COPY --from=composer:2.3 /usr/bin/composer /usr/bin/composer
COPY  ./composer.* /var/www
COPY ./auth.json /var/www
RUN composer install --no-autoloader --no-suggest --no-scripts

FROM php:8.1

COPY --from=builder /var/www/vendor ./
COPY ./app .
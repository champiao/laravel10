FROM php:8.3-fpm

RUN apt-get update && apt-get upgrade -y

WORKDIR /app/
COPY . .

ENTRYPOINT [ "php artisan serve 0.0.0.0:80" ]
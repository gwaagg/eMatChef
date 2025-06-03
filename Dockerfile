FROM php:8.2-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git unzip zip curl libpq-dev libonig-dev \
    && docker-php-ext-install pdo pdo_pgsql

COPY . /app

RUN curl -sS https://getcomposer.org/installer | php && mv composer.phar /usr/local/bin/composer

RUN composer install

CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
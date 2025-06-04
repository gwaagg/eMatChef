FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git zip unzip curl libzip-dev libonig-dev libxml2-dev \
    default-mysql-client \
    && docker-php-ext-install pdo_mysql zip

# Symfony CLI hinzufügen
RUN curl -sS https://get.symfony.com/cli/installer | bash && \
    mv /root/.symfony*/bin/symfony /usr/local/bin/symfony

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app
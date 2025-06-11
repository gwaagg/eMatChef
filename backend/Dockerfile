FROM php:8.3-cli

# Systemabhängigkeiten installieren
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip \
    curl \
    libicu-dev \
    libpq-dev \
    libonig-dev \
    libzip-dev \
    libxml2-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    libxslt1-dev \
    libssl-dev \
    default-mysql-client \
    && docker-php-ext-install intl pdo pdo_mysql zip opcache

# Composer installieren
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Arbeitsverzeichnis
WORKDIR /app

# Default Command für dev-server
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
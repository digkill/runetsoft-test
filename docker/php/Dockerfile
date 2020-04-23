FROM php:7.4-fpm

LABEL maintainer="Vitaliy Edifanov <vitaliy@edifanov.com>"

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y \
#    libonig-dev \
#    libxml2-dev \
#    libmcrypt-dev \
#    zlib1g-dev \
#    graphviz \
#    libcurl4-openssl-dev \
#    pkg-config \
#    libpq-dev \

    # гит
    git \
    # сурл
    curl \
    # библиотека для работы png
    libpng-dev \
    # библиотека для PostgreSQL
    libpq-dev \
    # библиотека для zip
    libzip-dev \
    # библиотека для работы jpeg
    libjpeg62-turbo-dev \
    # библиотека для типографии
    libfreetype6-dev \

    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    nano

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath

RUN docker-php-ext-install pgsql \
  && docker-php-ext-install pdo_pgsql \
  && docker-php-ext-install intl \
  && docker-php-ext-install zip \
  && docker-php-ext-install opcache

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install -j$(nproc) gd \
  && docker-php-source delete


# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Create system user to run Composer and Artisan Commands
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user


USER $user

WORKDIR /var/www/app

EXPOSE 9000

CMD ["php-fpm", "-F"]
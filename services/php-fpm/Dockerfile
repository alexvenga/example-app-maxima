# PHP fpm
FROM php:8.4-fpm-bullseye

RUN apt-get update

RUN apt-get install -y \
		libfreetype-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
        libpq-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd

RUN pecl install redis \
	&& pecl install xdebug \
	&& pecl install mongodb \
	&& docker-php-ext-enable redis xdebug mongodb

RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql \
    && docker-php-ext-enable pdo pdo_mysql pdo_pgsql

RUN curl -fsSL https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin

RUN mv "$PHP_INI_DIR/php.ini-development" "$PHP_INI_DIR/php.ini"

EXPOSE 9000

WORKDIR /application



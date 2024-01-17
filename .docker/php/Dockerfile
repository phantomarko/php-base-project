FROM php:8.3-fpm

WORKDIR /var/www/

RUN apt-get update -y && apt-get upgrade -y
RUN apt-get install -y build-essential libzip-dev zip \
    nano git curl libcurl4-openssl-dev pkg-config libssl-dev

RUN pecl config-set php_ini /etc/php.ini

RUN docker-php-ext-install pdo_mysql zip pcntl

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY . /var/www/

EXPOSE 9000

CMD ["php-fpm"]
FROM php:8.3-fpm

WORKDIR /var/www/

RUN apt-get update -y && apt-get upgrade -y
RUN apt-get install -y build-essential nano curl libcurl4-openssl-dev libssl-dev libzip-dev zip

RUN pecl config-set php_ini /etc/php.ini

RUN docker-php-ext-install pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --version=2.6.6

COPY . /var/www/

EXPOSE 9000

CMD ["php-fpm"]

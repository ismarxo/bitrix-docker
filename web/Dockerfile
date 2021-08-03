FROM php:7.3-apache

RUN apt-get update && apt-get install -y \
    mc \
    cron \
    libzip-dev \
    unzip \
    libxml2-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libfreetype6-dev \
&& docker-php-ext-install \
    pdo_mysql \
    mysqli \
    mbstring \
    json \
    xml \
    zip \
    opcache \
&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install -j$(nproc) gd

#копирование скрипта-заглушки для обработки функции php mail
RUN mkdir /var/www/system_dir
COPY mail.php /var/www/system_dir

#добавление директив php.ini
COPY bx.ini /usr/local/etc/php/conf.d/

#создание виртуальных хостов
COPY sites.conf /etc/apache2/sites-available/000-default.conf

#включение mod rewrite-а Apache
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load

#добавление настроек opcache
COPY opcache.ini /usr/local/etc/php/conf.d/opcache.ini
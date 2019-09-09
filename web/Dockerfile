FROM php:7.1-apache

RUN apt-get update && apt-get install -y \
    mc \
    cron \
	zip \
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
&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
&& docker-php-ext-install -j$(nproc) gd \
&& docker-php-ext-install zip

#добавление директив php.ini
COPY bx.ini /usr/local/etc/php/conf.d/

#создание виртуальных хостов
COPY sites.conf /etc/apache2/sites-available/000-default.conf

#включение mod rewrite-а Apache
RUN ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/rewrite.load
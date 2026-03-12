FROM php:5.6-apache

RUN docker-php-ext-install mysql mysqli

RUN a2enmod rewrite

COPY php.ini /usr/local/etc/php/
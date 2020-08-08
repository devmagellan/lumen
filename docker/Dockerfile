FROM php:7.2.24-fpm

MAINTAINER Roberto Arruda <robertoarruda@gmail.com>

RUN apt update -yqq \
    && apt full-upgrade -y \
    && pecl channel-update pecl.php.net \
    && apt install nano 


COPY ./ap /var/www/html



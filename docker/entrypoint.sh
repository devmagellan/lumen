#!/bin/sh
service nginx start
php-fpm
php artisan migrate

#!/usr/bin/env bash
git pull

composer install

php artisan migrate --force
php artisan view:clear
php artisan route:clear
php artisan config:clear
php artisan clear-compiled
#
service php-fpm-71 reload

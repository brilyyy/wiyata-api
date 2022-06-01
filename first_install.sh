#! /bin/sh

composer install && php artisan key:generate && php artisan migrate:fresh --seed && php artisan passport:install --force

#!/bin/sh

# Generate key & migrate
php artisan key:generate
php artisan migrate --force

# Start Apache
apache2-foreground

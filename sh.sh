php artisan db:wipe --force

composer install
composer dump-autoload

php artisan cache:clear

php artisan migrate --force

# php artisan db:seed --force

php artisan key:generate --force

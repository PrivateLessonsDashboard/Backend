php artisan key:generate
php artisan migrate:fresh --seed
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan serve --port="$PORT" --host=0.0.0.0

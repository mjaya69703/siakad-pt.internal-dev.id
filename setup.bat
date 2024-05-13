@echo off

echo Setup Environment...
cp .env.example .env
php artisan key:generate
rm public/storage
php artisan storage:link
pause

echo Menjalankan Migrasi Database...
php artisan migrate
pause

echo Menjalankan Refresh Migrasi dengan Seeder...
php artisan migrate:refresh --seed
pause

echo Menjalankan Composer Update...
composer update & echo Proses Installasi SiakadPT telah Selesai....

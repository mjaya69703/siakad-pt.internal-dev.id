@echo off
echo Menjalankan Composer Update...
start cmd /c setup-composer.bat
Proses Installasi SiakadPT telah Selesai....
pause

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



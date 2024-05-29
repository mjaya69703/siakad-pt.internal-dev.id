@echo off
echo Menjalankan Composer Update...
start cmd /c setup-composer.bat
echo Proses Installasi SiakadPT telah Selesai....
pause

echo Setup Environment...
cp .env.example .env
php artisan key:generate
rm public/storage
php artisan storage:link
pause

echo Tolong setting .env sebelum melanjutkan tahap installasi
code .
pause
echo Sudah Selesai Setting .env ?
pause

echo Menjalankan Migrasi Database...
php artisan migrate
pause

echo Menjalankan Refresh Migrasi dengan Seeder...
php artisan migrate:refresh --seed
pause

echo Proses Installasi Telah Selesai, Have Fun Sir :)
php artisan serve



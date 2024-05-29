#!/bin/bash
echo "Menjalankan Composer Update..."
composer install && echo "Proses Installasi SiakadPT telah Selesai..."
chmod +x setup.sh
chmod +x seed.sh
chmod +x clear.sh
read -p "Press enter to continue"


echo "Setup Environment..."
cp .env.example .env
php artisan key:generate
rm public/storage
php artisan storage:link
code .
read -p "Silahkan setting pada .env terlebih dahulu"

echo "Menjalankan Migrasi Database..."
php artisan migrate
read -p "Press enter to continue"

echo "Menjalankan Refresh Migrasi dengan Seeder..."
php artisan migrate:refresh --seed
read -p "Proses Installasi Telah Selesai, Have Fun Sir :)"

php artisan serve

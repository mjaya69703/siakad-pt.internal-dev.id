#!/bin/bash

echo "Setup Environment..."
cp .env.example .env
php artisan key:generate
read -p "Press enter to continue"

echo "Menjalankan Migrasi Database..."
php artisan migrate
read -p "Press enter to continue"

echo "Menjalankan Refresh Migrasi dengan Seeder..."
php artisan migrate:refresh --seed
read -p "Press enter to continue"

echo "Menjalankan Composer Update..."
composer update && echo "Proses Installasi SiakadPT telah Selesai..."

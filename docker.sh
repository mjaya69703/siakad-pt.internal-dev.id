docker compose up -d --build
docker compose exec phpmyadmin chmod 777 /sessions
docker compose exec php mkdir storage/framework/views
docker compose exec php chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
docker compose exec php chmod -R 775 /var/www/storage /var/www/bootstrap/cache
docker compose exec php composer setup

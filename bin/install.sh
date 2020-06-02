#!/usr/bin/env bash

docker-compose down
docker-compose build && docker-compose up -d
docker-compose exec php composer install
#docker-compose exec php npm install
#docker-compose exec php php artisan migrate --seed
#docker-compose exec php php artisan scout:mysql-index
#docker-compose exec php ./vendor/bin/phpunit ./tests/
#docker-compose exec php php artisan get:credentials

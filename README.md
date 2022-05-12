# evoltatest

```
From root:


cd activity
cp .env.example .env
docker-compose up --build
docker exec -it evoltaactivity_php bash
composer install -o
php artisan migrate
php artisan db:seed

From root:

cd landing
cp .env.example .env
docker-compose up --build

```
Go to http://127.0.0.1:8098/

# FrontBackTask

перед началом запустить docker desktop,
в папке backend создать файл .env на основе .env-example
сайт находится на localhost:8081
1. cd deploy
2. docker compose up -d --build
3. docker compose exec backend composer install
4. docker compose exec backend php artisan migrate:fresh --seed

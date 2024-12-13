# FrontBackTask

## 1. Склонировать проект

## 2. Создать .env в backend и frontentd на основе .env.example

## 3. Перейти в папку deploy
```
cd deploy
```
## 4. Выполнить команды
Для запуска dev-сборки
```
docker compose up -d --build
docker compose exec backend composer install
docker compose exec backend php artisan migrate:fresh --seed
docker compose exec backend  chown -R www-data:www-data .
docker compose exec backend php artisan storage:link
```
Для запуска prod-сборки
```
docker compose -f docker-compose.prod.yml up -d --build
docker compose exec backend  composer install
docker compose exec backend php artisan migrate:fresh --seed
docker compose exec backend  chown -R www-data:www-data .
docker compose exec backend php artisan storage:link
```
### Данные для авторизации админа
admin@admin.com
superadmin

мяу

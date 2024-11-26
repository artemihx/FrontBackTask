# Используем node для сборки фронтенда
FROM node:18 as builder

# Устанавливаем рабочую директорию
WORKDIR /app

# Копируем package.json и package-lock.json для установки зависимостей
COPY project/frontend/package*.json ./

# Устанавливаем зависимости
RUN npm install

# Копируем остальные файлы фронтенда
COPY project/frontend ./

# Собираем приложение
RUN npm run build

# Используем nginx для раздачи статики
FROM nginx:alpine

# Копируем собранное приложение в nginx
COPY --from=builder /app/dist /usr/share/nginx/html

# Копируем кастомный nginx.conf (если есть)
COPY deploy/frontend/nginx.conf /etc/nginx/conf.d/default.conf

# Указываем порт
EXPOSE 80

CMD ["nginx", "-g", "daemon off;"]

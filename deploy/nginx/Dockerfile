FROM nginx:alpine

COPY ./deploy/nginx/nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/public

COPY ./project/backend /var/www/public

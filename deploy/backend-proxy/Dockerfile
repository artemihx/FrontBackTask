FROM nginx:alpine

COPY ./deploy/backend-proxy/nginx.conf /etc/nginx/conf.d/default.conf

WORKDIR /var/www/public

COPY ./project/backend /var/www/public

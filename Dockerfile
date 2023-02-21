

# php
FROM php:8.1

RUN docker-php-ext-install pdo pdo_mysql sockets
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY . .
RUN composer install

# node install
FROM node:alpine
COPY package.json ./
RUN npm install
COPY . .
CMD [ "npm","run ","dev" ]
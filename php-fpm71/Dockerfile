FROM php:7.1-fpm

# 换源
RUN mv /etc/apt/sources.list /etc/apt/sources.list.bak
COPY sources.list /etc/apt/

RUN apt-get update && apt-get install -y \
    && docker-php-ext-install mysqli pdo_mysql 
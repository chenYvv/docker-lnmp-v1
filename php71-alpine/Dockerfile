FROM php:7.1-fpm-alpine

# redis 版本
ENV PHPREDIS_VERSION 3.1.6

# 安装composer
COPY composer.phar /usr/local/bin/composer

# 工作目录
WORKDIR /var/www/html

# 修改为国内源, v3.4要和所使用alpine版本一致
RUN cp /etc/apk/repositories /etc/apk/repositories.bak \
    && echo "http://mirrors.aliyun.com/alpine/v3.4/main/" > /etc/apk/repositories \
    && apk update \
    && apk upgrade \
    && docker-php-ext-install mysqli pdo_mysql \
# redis 扩展
    && curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz \
    && tar xfz /tmp/redis.tar.gz \
    && rm -r /tmp/redis.tar.gz \
    && mkdir -p /usr/src/php/ext \
    && mv phpredis-$PHPREDIS_VERSION /usr/src/php/ext/redis \
    && docker-php-ext-install redis \
#如果这段不加构建的镜像将大100M      
    && rm -rf /usr/src/php \
#中国全量镜像    
    && composer config -g repo.packagist composer https://packagist.phpcomposer.com
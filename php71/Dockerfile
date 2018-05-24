FROM php:7.1-fpm

# redis 版本
ENV PHPREDIS_VERSION 3.1.6

# 安装composer
COPY composer.phar /usr/local/bin/composer

# 换源文件
COPY sources.list /etc/apt/china.sources.list

# 工作目录
WORKDIR /var/www/html

# 修改为国内源
RUN mv /etc/apt/sources.list /etc/apt/sources.list.bak \
    && mv /etc/apt/china.sources.list /etc/apt/sources.list \
    && apt-get update \
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
  #composer 国内源
    && composer config -g repo.packagist composer https://packagist.phpcomposer.com

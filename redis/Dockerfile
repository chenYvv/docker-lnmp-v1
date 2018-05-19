FROM redis:3.2-alpine

# 修改为国内源, v3.7要和所使用alpine版本一致
RUN cp /etc/apk/repositories /etc/apk/repositories.bak \
    && echo "http://mirrors.aliyun.com/alpine/v3.7/main/" > /etc/apk/repositories \
    && apk update \
    && apk upgrade \

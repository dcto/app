FROM --platform=linux/amd64 phpswoole/swoole:5.1-php8.0-alpine

LABEL maintainer="varimax" version="2.0" license="MIT" app.name="app"

ENV TIMEZONE=Asia/Shanghai

RUN set -ex && apk update \
    && apk add --no-cache tzdata \
    && echo "${TIMEZONE}" > /etc/timezone \
    && ln -sf /usr/share/zoneinfo/${TIMEZONE}  /etc/localtime \
    && cd /usr/local/etc/php \
    && cp php.ini-production php.ini \
    && { \
        echo "upload_max_filesize=128M"; \
        echo "post_max_size=128M"; \
        echo "memory_limit=2G"; \
        echo "date.timezone=${TIMEZONE}"; \
    } | tee conf.d/99_overrides.ini \
    && apk del tzdata ${PHPIZE_DEPS} && rm -rf /tmp/* /var/cache/apk/* /usr/share/man/*

WORKDIR /var/www

COPY . .

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer  \
    && php -r "unlink('composer-setup.php');" \
    && composer config repo.packagist composer https://mirrors.aliyun.com/composer/ \
    && composer install --no-cache --no-dev -o \ 
    && php -m \
    && php -v \
    && date \
    && echo -e "Build Completed." 

EXPOSE 8620

ENTRYPOINT ["composer", "start"]
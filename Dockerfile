FROM php:8.0-fpm-alpine3.16

LABEL maintainer="Varimax Developer" version="2.0" license="MIT" app.name="varimax"

ARG timezone

ENV TIMEZONE=${timezone:-"Asia/Shanghai"}

RUN set -ex \
    && apk update \
    && apk add -U tzdata \
    && echo "${TIMEZONE}" > /etc/timezone \
    && ln -sf /usr/share/zoneinfo/${TIMEZONE}  /etc/localtime \
    && cd /usr/local/etc/php \
    && cp php.ini-production php.ini \
    && { \
        echo "upload_max_filesize=128M"; \
        echo "post_max_size=128M"; \
        echo "memory_limit=2G"; \
        echo "date.timezone=${TIMEZONE}"; \
    } | tee conf.d/99_overrides.ini 

RUN docker-php-ext-install pdo pdo_mysql 
    # && pecl install -o -f redis && rm -rf /tmp/pear  \
    # && docker-php-ext-enable redis 

RUN php -r "copy('https://install.phpcomposer.com/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer  \
    && php -r "unlink('composer-setup.php');" \
    && php -m \
    && php -v

RUN rm -rf /var/cache/apk/* /tmp/* /usr/share/man \
    && echo -e "\033[42;37m Build Completed :).\033[0m\n"

WORKDIR /opt/www

COPY . /opt/www

RUN composer config repo.packagist composer https://mirrors.aliyun.com/composer/

# RUN composer install --no-dev -o
RUN echo '#!/bin/bash' > /healthcheck && \
EXPOSE 8620

ENTRYPOINT ["composer", "start"]
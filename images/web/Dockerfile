FROM alpine:3.8
# @see https://github.com/docker-library/httpd/blob/master/2.4/alpine/Dockerfile

ENV PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin

RUN apk add --no-cache vim bash procps curl shadow libcap sudo \
    php7-cli \
    php7-fileinfo \
    php7-intl \
    php7-ftp \
    php7-xdebug \
    php7-json \
    php7-mcrypt \
    php7-mbstring \
    php7-soap \
    php7-gmp \
    php7-pdo_odbc \
    php7-dom \
    php7-pdo \
    php7-zip \
    php7-mysqli \
    php7-sqlite3 \
    php7-pdo_pgsql \
    php7-bcmath \
    php7-gd \
    php7-odbc \
    php7-pdo_mysql \
    php7-pdo_sqlite \
    php7-gettext \
    php7-xmlreader \
    php7-xmlwriter \
    php7-tokenizer \
    php7-xmlrpc \
    php7-bz2 \
    php7-pdo_dblib \
    php7-curl \
    php7-ctype \
    php7-session \
    php7-redis \
    php7-apcu \
    php7-exif \
    php7-simplexml \
    composer git \
    apache2 php7-apache2 \
    && mkdir -p /run/apache2/ \
    && rm -rf /var/www/localhost/* \
    && apk add --no-cache nodejs npm yarn libpng-dev build-base composer \
    && sync

COPY /data /

EXPOSE 80
ENTRYPOINT ["entrypoint"]
CMD ["httpd-fg"]

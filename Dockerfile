FROM trafex/php-nginx:3.0.0

USER root

COPY --chmod=0644 ./etc/default.conf /etc/nginx/conf.d/
COPY --chmod=0644 ./etc/php.ini /etc/php81/

RUN apk add --no-cache php81-pdo php81-pdo_mysql php81-tokenizer php81-dom \
    php81-json php81-xml php81-tokenizer php81-mbstring php81-xmlwriter

RUN curl -O "https://getcomposer.org/download/2.5.5/composer.phar"
RUN chmod a+x composer.phar
RUN mv composer.phar /usr/bin/composer

COPY ./composer.json ./composer.lock  ./
RUN composer install --no-dev --no-interaction --no-scripts --ignore-platform-reqs

COPY . /var/www/app
RUN chmod -R 777 /var/www/app/storage/

USER nobody
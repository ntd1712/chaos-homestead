FROM php:7.1-fpm-alpine

# Install extensions
RUN \
    echo "http://alpine.gliderlabs.com/alpine/v3.4/main" >> /etc/apk/repositories  && \
    echo "http://alpine.gliderlabs.com/alpine/edge/testing" >> /etc/apk/repositories && \
    echo "http://alpine.gliderlabs.com/alpine/edge/main" >> /etc/apk/repositories && \
    echo "http://alpine.gliderlabs.com/alpine/edge/community" >> /etc/apk/repositories && \
    apk update && \
    apk add curl rabbitmq-c-dev gearman-dev libevent-dev

RUN \
    curl -L -o /tmp/redis.tar.gz https://github.com/phpredis/phpredis/archive/3.1.2.tar.gz && \
    cd /tmp && tar xfz /tmp/redis.tar.gz -C /tmp/ \
       && mkdir -p /usr/src/php/ext/redis \
       && mv phpredis-3.1.2/* /usr/src/php/ext/redis \
       && rm -r /tmp/redis.tar.gz /tmp/phpredis-3.1.2 && \

    curl -L -o /tmp/amqp.tar.gz https://github.com/pdezwart/php-amqp/archive/v1.9.0.tar.gz && \
        cd /tmp && tar xfz /tmp/amqp.tar.gz -C /tmp/ \
           && mkdir -p /usr/src/php/ext/amqp \
           && mv php-amqp-1.9.0/* /usr/src/php/ext/amqp \
           && rm -r /tmp/amqp.tar.gz /tmp/php-amqp-1.9.0 && \

   curl -L -o /tmp/gearman.tar.gz https://github.com/wcgallego/pecl-gearman/archive/gearman-2.0.3.tar.gz && \
        cd /tmp && tar xfz /tmp/gearman.tar.gz -C /tmp/ \
           && mkdir -p /usr/src/php/ext/gearman \
           && mv pecl-gearman-gearman-2.0.3/* /usr/src/php/ext/gearman \
           && rm -r /tmp/gearman.tar.gz /tmp/pecl-gearman-gearman-2.0.3 && \

   curl -L -o /tmp/event.tar.gz https://pecl.php.net/get/event-2.3.0.tgz && \
       cd /tmp && tar xfz /tmp/event.tar.gz -C /tmp/ \
          && mkdir -p /usr/src/php/ext/event \
          && mv event-2.3.0/* /usr/src/php/ext/event \
          && rm -r /tmp/event.tar.gz /tmp/event-2.3.0 && \

  curl -L -o /tmp/apcu.tar.gz https://github.com/krakjoe/apcu/archive/v5.1.8.tar.gz && \
         cd /tmp && tar xfz /tmp/apcu.tar.gz -C /tmp/ \
            && mkdir -p /usr/src/php/ext/apcu \
            && mv apcu-5.1.8/* /usr/src/php/ext/apcu \
            && rm -r /tmp/apcu.tar.gz /tmp/apcu-5.1.8 && \

  curl -L -o /tmp/xdebug.tar.gz https://github.com/xdebug/xdebug/archive/XDEBUG_2_5_0.tar.gz && \
       cd /tmp && tar xfz /tmp/xdebug.tar.gz -C /tmp/ \
          && mkdir -p /usr/src/php/ext/xdebug \
          && mv xdebug-XDEBUG_2_5_0/* /usr/src/php/ext/xdebug \
          && rm -r /tmp/xdebug.tar.gz /tmp/xdebug-XDEBUG_2_5_0

RUN \
    docker-php-ext-install apcu amqp gearman redis pdo_mysql bcmath opcache sockets xdebug && \
    docker-php-ext-configure event --with-event-core --with-event-extra --enable-event-debug && \
    docker-php-ext-install event

# Override configuration
COPY 99-overrides.ini /usr/local/etc/php/conf.d/
COPY docker-php-ext-opcache.ini /usr/local/etc/php/conf.d/
COPY docker-php-ext-xdebug.ini /usr/local/etc/php/conf.d/

COPY composer.phar /usr/local/bin/composer
RUN chmod 755 /usr/local/bin/composer

# EXPOSE 9000
CMD ["php-fpm", "--allow-to-run-as-root"]
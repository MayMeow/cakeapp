FROM php:fpm
MAINTAINER CakeHub <cakehub@cakehub.sk>

RUN requirements="libmcrypt-dev g++ libicu-dev libpq-dev libmcrypt4 libicu52 netcat" \
    && apt-get update && apt-get install -y $requirements \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install intl \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && requirementsToRemove="libmcrypt-dev g++ libicu-dev" \
    # && apt-get purge --auto-remove -y $requirementsToRemove \
    && rm -rf /var/lib/apt/lists/*

RUN curl -sSL https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && apt-get update \
    && apt-get install -y zlib1g-dev git wget \
    && docker-php-ext-install zip \
    && wget https://phar.phpunit.de/phpunit.phar \
    && chmod +x phpunit.phar \
    && mv phpunit.phar /usr/local/bin/phpunit \
    # && apt-get purge -y --auto-remove zlib1g-dev \
    && rm -rf /var/lib/apt/lists/*

# Redis extension installation and configure
RUN git clone https://github.com/phpredis/phpredis.git \
    && cd phpredis \
    && git checkout php7 \
    && phpize \
    && ./configure \
    && make && make install \
    && cd .. \
    && rm -rf phpredis

RUN docker-php-ext-enable redis

EXPOSE 8765

COPY docker-entry.sh /usr/local/bin/docker-entry
RUN chmod +x /usr/local/bin/docker-entry

CMD ["docker-entry"]

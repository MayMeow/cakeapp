FROM jdmaymeow/php:7-cli

# COPY . /usr/src/myapp

RUN curl http://releases.kukolos.sk/compute-server-0.0.1.tar.gz | tar -xvz
WORKDIR /compute-server-0.0.1

RUN ls -la

RUN composer selfupdate \
    && composer install

CMD [ "php", "./server.php" ]
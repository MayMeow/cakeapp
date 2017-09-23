# MayMeow Cloud Platform

May Meow Cloud Platform.

## Dependencies

* Optional
    * Apache
* Backend
    * PHP 7 or UP + dependencies
    * Composer
* Frontend
    * NodeJS + npm
    * Vue CLI

For docker installation

* PHP 5.5.9 or UP
* Docker
* Docker Compose
* NGiNX as proxy

## Development

* Backend

```bash
composer install
bin/cake mcloud-startup

# to run server, it will listen on localhost:8765
bin/cake server
```

* Frontend

```bash
npm install

#To build js files
npm run build
```


## Installation

1. Run 'git clone ssh://git@gitlab.cafe:2223/MayMeowCloudPlatform/maymeow-cloud.git {your-app-name}'. You will need deployment key.
2. Run Composer install.
3. bin/cake migrations migrate -p CakeAuth
4. bin/cake migrations migrate -p CakeNetworking
5. bin/cake migrations migrate -p CakeStorage

## Docker

```bash
docker create --name my-app --privileged -p 80 \
-e MYSQL_HOST=localhost \
-e MYSQL_USER=user \
-e MYSQL_PASSWORD=pass \
-e MYSQL_DB_NAME=database \
-v /data:/var/www/html/webroot/data jdmaymeow/app
```

## Docker Compose

To deploy to cloud run following commands

```bash
git clone ssh://git@gitlab.cafe:2223/MayMeowCloudPlatform/maymeow-cloud.git {your-app-name}
Composer install
docker-compose up -d

# DO NOT run following 2 lines
# docker exec maymeowcloud_platform_1 mcloud-startup
# docker exec -it maymeowcloud_platform_1 bin/cake mcloud_setup

# This one run ONLY first time after installation
docker exec -it maymeowcloud_platform_1 bin/cake migrations seed -p MCloudResources
```

## Backup and restore database

All databases running in container

```bash
docker stop maymeowcloud_platform_1
docker exec maymeowcloud_db_1 sh -c 'exec mysqldump --all-databases -u"$MYSQL_USER" -p"$MYSQL_ROOT_PASSWORD"' > all-databases.sql
```

Only MayMeowCloud database

```bash
docker stop maymeowcloud_platform_1
docker exec maymeowcloud_db_1 sh -c 'exec mysqldump -u"$MYSQL_USER" -p"$MYSQL_ROOT_PASSWORD" "$MYSQL_DATABASE"' > maymeowcloud.sql
```

Restore database

```bash
docker stop maymeowcloud_platform_1
docker exec -i maymeowcloud_db_1 sh -c 'exec mysql -u"$MYSQL_USER" -p"$MYSQL_ROOT_PASSWORD" "$MYSQL_DATABASE"' < maymeowcloud.sql
```

When you are done start platfom server `docker start maymeowcloud_platform_1` or from source folder `docker-compose start`

# Contributing

Clone this repository

Use [CakeApp Development kit](https://cakehub.sk/cakeapp-sk/cakeapp-development-kit) for setting your development environment and copy dev config file over app.config

```bash
cp config/app.development.php config/app.php
```

# MayMeow Cloud Platform

May Meow Cloud Platform.

## Dependencies

* HTTP Server. For example: Apache. Having mod_rewrite is preferred, but by no means required.
* PHP 5.6.0 or greater (including PHP 7.1).
* mbstring PHP extension
* intl PHP extension
* simplexml PHP extension
* redis PHP extension
* postgres PHP extension
* Redis server
* PostgreSQL database server (if you want use MysQL change `app.config`)
* Git

## Development

For development you will need installed database server and Redis server or you can use lab right here from project (you will need Docker and Docker Compose)

```bash
git clone repository cakeapp-ce
cd cakeapp-ce/cakeapp-lab
docker-compose up -d --build
cd ../
composer install
```

Open `config\app.php` and update IP adresses for Redis Cache and Database

```bash
bin/cake cake_app_migrations migrate
# you can check if all migrations are UP
bin/cake cake_app_migrations status
# run server
bin/cake server
```

* Open your favorite browser and navigate to `http://localhost:8765/users/add`. 1st user which you create will be admin. 
* Now you can login into app with your credentials.

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
cd your-app-name
cp docker-compose.default.yml docker-compose.yml
docker-compose up -d --build
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

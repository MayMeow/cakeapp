# Installation from source

* GIT + OpenSSH
* PHP + Composer
* Apache
* NGINX
* Database
* Redist

## data store paths

* DATASTORE /va/opt/platform/data
    * git-data
    * backup
    * buckets
    * no-sql

## Check for update

```bash
sudo apt update
sudo apt upgrade
```

If you want you can remove old unused packages with

```bash
sudo apt autoremove --purge
```

## SSH and GIT

```bash
sudo apt install openssh-server git
```

Create new GIT user with home changed home folder and add it to www-data group

```bsah
sudo add user -D /var/opt/platform/data/git-data/repositories
sudo usermod -aG www-data git
```

## Mysql

```bash
sudo apt install mysql-server
```

//TODO create database and user

```bash
mysql -u root -p
mysql> CREATE DATABASE platform DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;

mysql> CREATE USER 'cakesource'@'localhost' IDENTIFIED BY 'cake$ource.2017';
mysql> GRANT ALL ON platform.* TO 'jeffrey'@'localhost';
mysql> FLUSH PRIVILEGES;
```

## Redis

```bash
sudo apt-get update
sudo apt-get install build-essential tcl

cd /tmp

curl -O http://download.redis.io/redis-stable.tar.gz
cd redis-stable
tar xzvf redis-stable.tar.gz
make
make test

sudo cp src/redis-server /usr/local/bin/
sudo cp src/redis-cli /usr/local/bin/
```

or `make install` instead of copying bin files

```bash
sudo mkdir /etc/redis
sudo mkdir /var/redis
sudo cp utils/redis_init_script /etc/init.d/redis_6379
sudo vi /etc/init.d/redis_6379

sudo cp redis.conf /etc/redis/6379.conf
sudo mkdir /var/redis/6379
```

* Edit the configuration file, making sure to perform the following changes:
* Set daemonize to yes (by default it is set to no).
* Set the pidfile to /var/run/redis_6379.pid (modify the port if needed).
* Change the port accordingly. In our example it is not needed as the default port is already 6379.
* Set your preferred loglevel.
* Set the logfile to /var/log/redis_6379.log
* Set the dir to /var/redis/6379 (very important step!)

```bash
sudo update-rc.d redis_6379 defaults
sudo /etc/init.d/redis_6379 start
```

## Apache + PHP + Composer

```bash
sudo apt install apache2
```

```bash
sudo apt install php7.0 libapache2-mod-php7.0
sudo apt install php7.0 php7.0-mcrypt php7.0-mysql php7.0-mbstring php7.0-intl php7.0-dev -y
```

//todo pridat konfiguraky pre apache do projektu

### PHP redis extension

### Composer install

```bash
curl -sSL https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
```

## Platform

```bash
git clone

sudo rsync -av /tmp/platform /var/www/html/
cd /var/www/html/
sudo composer install
bin/cake mcloud_setup
```

## NGINX

```bash
sudo apt-get update
sudo apt-get install nginx
```

//todo pridat konfiguraky pre nginx do projektu

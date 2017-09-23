#!/bin/sh

# GIT and Openssh config
apt-get update
sudo apt upgrade
sudo apt autoremove --purge
apt install openssh-server git -y
apt-get install build-essential tcl curl -y
apt install mysql-server -y

# Redist compile
cd /tmp
curl -O http://download.redis.io/redis-stable.tar.gz
cd redis-stable
tar xzvf redis-stable.tar.gz
make
make test
make install

# Redist config
cd /tmp
cd redis-stable
mkdir /etc/redis
mkdir /var/redis
cp utils/redis_init_script /etc/init.d/redis_6379
vi /etc/init.d/redis_6379
cp redis.conf /etc/redis/6379.conf
mkdir /var/redis/6379

# PHP Configs
apt install php7.0-fpm php7.0-mcrypt php7.0-mysql php7.0-mbstring php7.0-intl php7.0-dev -y

# Composer
cd /tmp
curl -sSL https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer

# NGINX

apt-get update
apt-get install nginx

adduser --system --no-create-home --group cakeapp

# Make dirs
mkdir -p /var/opt/platform/data/git-data /var/opt/platform/data/buckets /var/opt/platform/data/no-sql /var/opt/platform/data/user-data /var/opt/platform/logs /var/opt/platform/data/.ssh

chown cakeapp:cakeapp /var/opt/platform/data/git-data
chown cakeapp:cakeapp /var/opt/platform/data/git-data/repositories
chown cakeapp:cakeapp /var/opt/platform/data/buckets
chown cakeapp:cakeapp /var/opt/platform/data/no-sql
chown cakeapp:cakeapp /var/opt/platform/data/user-data
chown cakeapp:cakeapp /var/opt/platform/data/.ssh
chown cakeapp:cakeapp /var/opt/platform

chmod -R 775 /var/opt/platform
chmod -R 770 /var/opt/platform/data/git-data/repositories

ln -s /var/opt/platform/data/.ssh /var/opt/platform/data/git-data/repositories/.ssh

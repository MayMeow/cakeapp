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
sudo ./bootstrap,sh
```

## SSH and GIT

Create new GIT user with home changed home folder and add it to www-data group

```bsah
sudo add user -D /var/opt/platform/data/git-data/repositories
chown -R git:git /var/opt/platform/data/git-data/repositories
chmod 755 -R /var/opt/platform/data/git-data/repositories
```

```bash
sudo visudo

//allow cakeapp to run commands as git user
cakeapp ALL=(git) NOPASSWD: ALL
```

## Mysql

```bash
mysql -u root -p
mysql> CREATE DATABASE platform DEFAULT CHARACTER SET utf8 DEFAULT COLLATE utf8_unicode_ci;

mysql> CREATE USER 'cakesource'@'localhost' IDENTIFIED BY 'cake$ource.2017';
mysql> GRANT ALL ON platform.* TO 'jeffrey'@'localhost';
mysql> FLUSH PRIVILEGES;
```

## Redis

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
cp /etc/platform/lib/cakehub-nginx.conf /etc/nginx/sites-enabled/cakehub-nginx.conf
```

### POST INSTALL

recomended to create one user and group for git php-fpm and nginx and add git user to this group
```bash
adduser --system --no-create-home --group cakeapp
usermod -aG git cakeapp // add to git group

edit /etc/php/7.0/fpm/pool.d/www.conf and change user amd listen-user and group to cakeapp
edit /etc/nginx/nginx.conf and change user to cakeapp
```

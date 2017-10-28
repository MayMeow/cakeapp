#!/bin/bash

echo -ne "Update folder and files rights..."
# chmod 777 /cakeapp/git-data
chmod 777 /var/www/html/webroot/user-data
chmod 777 /cakeapp/.ssh
# chown www-data:www-data /cakeapp/git-data/repositories
chown www-data:www-data /var/opt/cakeapp/data
chmod +x /var/www/html/bin/cake

if [ ! -f /var/www/html/vendor/autoload.php ]; then
    echo "Autoload file not found! Installing dependencies..."
    composer selfupdate
    composer install
fi

echo "Wait until database $MYSQL_HOST:5432 is ready..."
until nc -z $MYSQL_HOST 5432
do
    sleep 1
done

# Wait to avoid "panic: Failed to open sql connection pq: the database system is starting up"
sleep 1

echo "Running migrations..."
cd /var/www/html
bin/cake mcloud_setup

echo "Starting server..."
php-fpm

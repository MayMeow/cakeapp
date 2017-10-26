#!/bin/bash

echo -ne "Update folder and files rights..."
chmod 777 -R /var/www/html/tmp
chmod 777 -R /var/www/html/logs
chmod 777 -R /var/www/html/datastore
chmod 777 -R /var/www/html/webroot/data
chmod 777 -R /var/opt/cakeapp/data
chmod +x /var/www/html/bin/cake

echo "Wait until database $MYSQL_HOST:3306 is ready..."
until nc -z $MYSQL_HOST 3306
do
    sleep 1
done

# Wait to avoid "panic: Failed to open sql connection pq: the database system is starting up"
sleep 1

echo "Running migrations..."
cd /var/www/html
bin/cake mcloud_setup

echo "Starting server..."
apache2-foreground
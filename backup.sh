#!/bin/bash
####################################
#
# Backup to NFS mount script.
#
####################################

# What to backup.
backup_files="/var/opt/platform/data/git-data"

# Where to backup to.
dest="/var/opt/platform/data/backups"

# Create archive filename.
day=$(date +%s)
hostname="cakeapp"
archive_file="$hostname-$day.tgz"


# Print start status message.
echo "Backing up $backup_files to $dest/$archive_file"
date
echo

# Backup the files using tar.
tar czf $dest/$archive_file $backup_files

# Backup database

echo
echo "backing up database"
echo

MYSQL_USER="cakesource"
MYSQL_ROOT_PASSWORD="cake$ource.2017"
MYSQL_DATABASE="platform"
archive_db_file="$hostname-$day.sql"

mysqldump -u"$MYSQL_USER" -p"$MYSQL_ROOT_PASSWORD" "$MYSQL_DATABASE" > $dest/$archive_db_file

# Print end status message.
echo
echo "Backup finished"
date

# Long listing of files in $dest to check file sizes.
ls -lh $dest

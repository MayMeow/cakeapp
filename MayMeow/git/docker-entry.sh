#!/bin/bash

if [ -e /cakeapp/.ssh/authorized_keys ]; then
    echo "Authorized keys found, copying to ssh ..."
    cp /cakeapp/.ssh/authorized_keys /cakeapp/git-data/repositories/.ssh/authorized_keys
    chmod 600 /cakeapp/git-data/repositories/.ssh/authorized_keys
    chmod 700 /cakeapp/git-data/repositories/.ssh
    chown -R git:git /cakeapp/git-data/repositories/.ssh
fi


echo "Starting GIT service..."
/usr/sbin/sshd -D

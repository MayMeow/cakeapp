FROM alpine
MAINTAINER May Meow <jdmaymeow@gmail.com>

RUN mkdir -p /cakeapp/git-data/repositories/.ssh

# copy all scripts
COPY . /var/www/html

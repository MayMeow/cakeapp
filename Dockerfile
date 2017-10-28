FROM alpine
MAINTAINER May Meow <jdmaymeow@gmail.com>

RUN mkdir -p /cakeapp/git-data/repositories/.ssh
RUN mkdir -p /var/opt/cakeapp/data/git-data
RUN mkdir -p /var/opt/cakeapp/data/buckets
RUN mkdir -p /var/opt/cakeapp/data/repositories

# copy all scripts
COPY . /var/www/html

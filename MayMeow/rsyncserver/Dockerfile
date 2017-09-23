FROM ubuntu
MAINTAINER May Meow <jdmaymeow@gmail.com>

RUN apt-get update && \
  DEBIAN_FRONTEND=noninteractive apt-get install -yq \
    rsync

RUN mkdir -p /bucket
RUN chmod a+rw /bucket

EXPOSE 873
ADD ./run /usr/local/bin/run
RUN chmod +x /usr/local/bin/run

ENTRYPOINT ["/usr/local/bin/run"]
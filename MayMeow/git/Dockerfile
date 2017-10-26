FROM php:latest

RUN apt-get update && apt-get install -y openssh-server git
RUN mkdir /var/run/sshd
RUN echo 'root:screencast' | chpasswd

RUN adduser git --home /var/opt/cakeapp/data
RUN echo 'git:c4ke!App' | chpasswd

RUN mkdir /var/opt/cakeapp/data/.ssh
RUN chmod 700 /var/opt/cakeapp/data/.ssh

RUN sed -i 's/PermitRootLogin prohibit-password/PermitRootLogin yes/' /etc/ssh/sshd_config
RUN sed -i 's/StrictModes yes/StrictModes no/' /etc/ssh/sshd_config

# SSH login fix. Otherwise user is kicked off after login
RUN sed 's@session\s*required\s*pam_loginuid.so@session optional pam_loginuid.so@g' -i /etc/pam.d/sshd

ENV NOTVISIBLE "in users profile"
RUN echo "export VISIBLE=now" >> /etc/profile

COPY docker-entry.sh /usr/local/bin/docker-entry
RUN chmod +x /usr/local/bin/docker-entry

EXPOSE 22
CMD ["docker-entry"]

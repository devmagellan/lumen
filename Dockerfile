FROM centos:latest
MAINTAINER NewstarCorporation
RUN yum -y install httpd


RUN echo 'Hello, docker' > /var/www/html/index.html
CMD [“/usr/sbin/httpd”, “-D”, “FOREGROUND”]
EXPOSE 80

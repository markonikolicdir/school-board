FROM php:7.3-apache
RUN docker-php-ext-install pdo_mysql
RUN apt upgrade && apt update
RUN apt install vim -y
#CMD a2enmod rewrite && sudo service apache2 restart
EXPOSE 80
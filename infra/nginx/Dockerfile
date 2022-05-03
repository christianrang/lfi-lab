FROM ubuntu:20.04

RUN apt update

RUN apt install -y nginx

RUN apt install -y php php-fpm

RUN apt install -y vim
RUN apt install -y nano

RUN echo "# Hi I'm a super sneaky comment with info an attacker will never see!" >> /etc/passwd

COPY ./nginx.conf /etc/nginx/sites-enabled/localhost

CMD service php7.4-fpm start && nginx -g "daemon off;"

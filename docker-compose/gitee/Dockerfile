FROM ccr.ccs.tencentyun.com/celaraze/chemex:latest
RUN apt-get update

COPY ./.env.docker /var/www/chemex/.env
WORKDIR /var/www/chemex/
RUN git reset --hard && git pull --force
RUN composer update

COPY ./docker-compose/docker-entrypoint.sh /docker-entrypoint.sh
RUN chmod +x /docker-entrypoint.sh

entrypoint ["/docker-entrypoint.sh"]

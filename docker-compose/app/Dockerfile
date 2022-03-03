FROM celaraze/chemex:latest
RUN apt-get update

WORKDIR /var/www/chemex/
RUN git reset --hard && git pull --force
RUN composer update

COPY docker-entrypoint.sh /docker-entrypoint.sh
RUN chmod +x /docker-entrypoint.sh

entrypoint ["/docker-entrypoint.sh"]

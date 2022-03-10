FROM celaraze/chemex:latest
RUN apt-get update

RUN rm /var/www/chemex -rf
COPY . /var/www/chemex/
COPY .env.docker /var/www/chemex/.env
WORKDIR /var/www/chemex/

COPY docker-entrypoint.sh /docker-entrypoint.sh
RUN chmod +x /docker-entrypoint.sh

entrypoint ["/docker-entrypoint.sh"]

FROM celaraze/php-web:latest

COPY . /var/www/chemex/
COPY .env.docker /var/www/chemex/.env
WORKDIR /var/www/chemex/

RUN chown -R www-data:www-data /var/www/chemex && \
    chmod -R 755 /var/www/chemex && \
    chmod -R 777 /var/www/chemex/storage
RUN rmdir /var/www/html && \
    ln -s /var/www/chemex/public /var/www/html

COPY docker-entrypoint.sh /docker-entrypoint.sh
RUN chmod +x /docker-entrypoint.sh

entrypoint ["/docker-entrypoint.sh"]

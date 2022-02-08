FROM php:8-apache
RUN apt-get update && \
    apt-get install -y git libzip-dev libldap-dev mariadb-client && \
    apt-get clean
RUN docker-php-ext-install -j$(nproc) zip ldap bcmath mysqli pdo_mysql sockets
RUN a2enmod rewrite
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

COPY . /var/www/chemex/

WORKDIR /var/www/chemex/
RUN composer update
RUN chown -R www-data:www-data /var/www/chemex && \
    chmod -R 755 /var/www/chemex && \
    chmod -R 777 /var/www/chemex/storage
RUN rmdir /var/www/html && \
    ln -s /var/www/chemex/public /var/www/html

COPY docker-entrypoint.sh /docker-entrypoint.sh
RUN chmod +x /docker-entrypoint.sh

ENTRYPOINT ["/docker-entrypoint.sh"]
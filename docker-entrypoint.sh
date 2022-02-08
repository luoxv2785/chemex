#!/bin/bash
set -e

# Set the environment variables
source /var/www/chemex/.env

# Wait for MySQL
while ! mysqladmin ping -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" -P${DB_PORT:-3306} --silent; do
    echo "MariaDB container might not be ready yet. Sleeping..."
    sleep 3
done

# Initialize application
[ -z "${APP_KEY}" ] && php artisan jwt:secret -f && php artisan chemex:install -n

# Run application
apache2-foreground
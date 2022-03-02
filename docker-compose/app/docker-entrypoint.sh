#!/bin/bash
set -e

# 设置环境变量
source /var/www/chemex/.env

# 等待数据库服务启动
while ! mysqladmin ping -h"$APP_DATABASE_HOST" -u"$APP_DATABASE_USERNAME" -p"$APP_DATABASE_PASSWORD" -P"${APP_DATABASE_PORT:-3306}" --silent; do
    echo "数据库服务还未响应，继续等待"
    sleep 3
done

# 初始化应用程序
# [ -z "${APP_KEY}" ]
php artisan chemex:install

# 启动应用程序
apache2-foreground

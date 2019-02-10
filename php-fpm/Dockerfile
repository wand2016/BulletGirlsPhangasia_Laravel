ARG PHP_VERSION=${PHP_VERSION}
# ----------------------------------------
# ベースイメージ
# ----------------------------------------
FROM laradock/php-fpm:2.2-${PHP_VERSION}

# 設定ファイルのコピー
ARG PHP_VERSION=${PHP_VERSION}
# なぜか7.2.4になってコケるので諦めました
COPY ./php-fpm/php7.2.ini /usr/local/etc/php/php.ini


# これをしないとstorage/logsの書き込みでpermission errorになる
USER www-data

ARG APP_CODE_PATH_CONTAINER=${APP_CODE_PATH_CONTAINER}
WORKDIR ${APP_CODE_PATH_CONTAINER}

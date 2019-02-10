FROM composer

# composerを速くするやつ
RUN composer config -g repositories.packagist composer https://packagist.jp
RUN composer global require hirak/prestissimo


ARG APP_CODE_PATH_CONTAINER=${APP_CODE_PATH_CONTAINER}
WORKDIR ${APP_CODE_PATH_CONTAINER}

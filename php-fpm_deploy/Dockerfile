ARG REGISTRY_PORT=${REGISTRY_PORT}

# ----------------------------------------
# multi-stage build
# ----------------------------------------

FROM registry:${REGISTRY_PORT}/base/composer as built-php

# コードのコピー
ARG APP_CODE_PATH_HOST=${APP_CODE_PATH_HOST}
ARG APP_CODE_PATH_CONTAINER=${APP_CODE_PATH_CONTAINER}
COPY --chown=www-data:www-data ${APP_CODE_PATH_HOST} ${APP_CODE_PATH_CONTAINER}


RUN composer install

FROM registry:${REGISTRY_PORT}/base/node as built-php-and-js

# コードのコピー
ARG APP_CODE_PATH_CONTAINER=${APP_CODE_PATH_CONTAINER}
COPY --from=built-php --chown=www-data:www-data ${APP_CODE_PATH_CONTAINER} ${APP_CODE_PATH_CONTAINER}


RUN yarn
RUN yarn prod


# ----------------------------------------
# ベースイメージ
# ----------------------------------------
FROM registry:${REGISTRY_PORT}/base/php-fpm

# コードのコピー
ARG APP_CODE_PATH_CONTAINER=${APP_CODE_PATH_CONTAINER}
COPY --from=built-php-and-js --chown=www-data:www-data ${APP_CODE_PATH_CONTAINER} ${APP_CODE_PATH_CONTAINER}

# env
RUN cp ${APP_CODE_PATH_CONTAINER}/.env.example  ${APP_CODE_PATH_CONTAINER}/.env

USER www-data

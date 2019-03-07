# ----------------------------------------
# multi-stage build
# ----------------------------------------

ARG COMPOSE_PROJECT_NAME=${COMPOSE_PROJECT_NAME}

FROM ${COMPOSE_PROJECT_NAME}_composer as built-php

# コードのコピー
ARG APP_CODE_PATH_HOST=${APP_CODE_PATH_HOST}
ARG APP_CODE_PATH_CONTAINER=${APP_CODE_PATH_CONTAINER}
COPY --chown=www-data:www-data ${APP_CODE_PATH_HOST} ${APP_CODE_PATH_CONTAINER}

RUN composer install

FROM ${COMPOSE_PROJECT_NAME}_node as built-php-and-js

# コードのコピー
ARG APP_CODE_PATH_CONTAINER=${APP_CODE_PATH_CONTAINER}
COPY --from=built-php --chown=www-data:www-data ${APP_CODE_PATH_CONTAINER} ${APP_CODE_PATH_CONTAINER}

# パッケージ取得・ビルド
RUN yarn
RUN yarn prod


# ----------------------------------------
# ベースイメージ
# ----------------------------------------
FROM ${COMPOSE_PROJECT_NAME}_php-fpm

# コードのコピー
ARG APP_CODE_PATH_CONTAINER=${APP_CODE_PATH_CONTAINER}
COPY --from=built-php-and-js --chown=www-data:www-data ${APP_CODE_PATH_CONTAINER} ${APP_CODE_PATH_CONTAINER}

# env
RUN cp ${APP_CODE_PATH_CONTAINER}/.env.example  ${APP_CODE_PATH_CONTAINER}/.env

USER www-data

ARG REGISTRY_PORT=${REGISTRY_PORT}

# ----------------------------------------
# ベースイメージ
# ----------------------------------------
FROM registry:${REGISTRY_PORT}/base/php-fpm

# コードのコピー
ARG APP_CODE_PATH_CONTAINER=${APP_CODE_PATH_CONTAINER}
WORKDIR ${APP_CODE_PATH_CONTAINER}

COPY --from=built --chown=www-data:www-data ${APP_CODE_PATH_CONTAINER} ${APP_CODE_PATH_CONTAINER}


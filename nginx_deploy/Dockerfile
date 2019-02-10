ARG REGISTRY_PORT=${REGISTRY_PORT}

# ----------------------------------------
# ビルド成果物抽出用
# ----------------------------------------
FROM registry:${REGISTRY_PORT}/deploy/php-fpm as built


# ----------------------------------------
# ベースイメージ
# ----------------------------------------
FROM registry:${REGISTRY_PORT}/base/nginx

# コードのコピー
# 静的ファイルだけでいいのでpublicのみ
ARG APP_CODE_PATH_CONTAINER=${APP_CODE_PATH_CONTAINER}
COPY --from=built --chown=www-data:www-data ${APP_CODE_PATH_CONTAINER}/public ${APP_CODE_PATH_CONTAINER}/public

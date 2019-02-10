docker-compose -f base-image-builder.yml build


# ブレース展開したい人生だった
docker image push registry:${REGISTRY_PORT}/base/nginx
docker image push registry:${REGISTRY_PORT}/base/php-fpm
docker image push registry:${REGISTRY_PORT}/base/mysql
docker image push registry:${REGISTRY_PORT}/base/node
docker image push registry:${REGISTRY_PORT}/base/composer

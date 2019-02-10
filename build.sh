docker-compose -f docker-compose-deploy.yml build

docker image push registry:${REGISTRY_PORT}/deploy/nginx:latest
docker image push registry:${REGISTRY_PORT}/deploy/php-fpm:latest

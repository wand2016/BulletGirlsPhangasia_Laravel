# login ecr
# CRが含まれるのでsedで除く
docker container run --rm -it \
       -e AWS_ACCESS_KEY_ID=$AWS_ACCESS_KEY_ID \
       -e AWS_SECRET_ACCESS_KEY=$AWS_SECRET_ACCESS_KEY \
       -e DEFAULT_REGION_NAME=$DEFAULT_REGION_NAME \
       -e DEFAULT_OUTPUT_FORMAT=$DEFAULT_OUTPUT_FORMAT \
       wandta/aws ecr get-login --no-include-email --region ap-northeast-1 \
    | sed --expression='s/\r$//' \
    | sh

# push nginx image
docker image tag ${COMPOSE_PROJECT_NAME}_nginx ${AWS_ECR_HOST}/bgp/nginx:latest
docker image push ${AWS_ECR_HOST}/bgp/nginx:latest

# push php-fpm image
docker image tag ${COMPOSE_PROJECT_NAME}_php-fpm_deploy ${AWS_ECR_HOST}/bgp/php-fpm:latest
docker image push ${AWS_ECR_HOST}/bgp/php-fpm:latest

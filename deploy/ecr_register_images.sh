# login ecr
# CRが含まれるのでsedで除く
docker run --rm -it \
       -e AWS_ACCESS_KEY_ID=$AWS_ACCESS_KEY_ID \
       -e AWS_SECRET_ACCESS_KEY=$AWS_SECRET_ACCESS_KEY \
       -e DEFAULT_REGION_NAME=$DEFAULT_REGION_NAME \
       -e DEFAULT_OUTPUT_FORMAT=$DEFAULT_OUTPUT_FORMAT \
       wandta/aws ecr get-login --no-include-email --region ap-northeast-1 \
    | sed --expression='s/\r$//' \
    | sh


docker image pull registry:${REGISTRY_PORT}/deploy/nginx:latest
docker image pull registry:${REGISTRY_PORT}/deploy/php-fpm:latest

# push nginx image
docker tag registry:${REGISTRY_PORT}/deploy/nginx:latest ${AWS_ECR_HOST}/bgp/nginx:latest
docker push ${AWS_ECR_HOST}/bgp/nginx:latest

# push php-fpm image
docker tag registry:${REGISTRY_PORT}/deploy/php-fpm:latest ${AWS_ECR_HOST}/bgp/php-fpm:latest
docker push ${AWS_ECR_HOST}/bgp/php-fpm:latest

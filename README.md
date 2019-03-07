# 最初にやるやつ

1. `cp env_sample .env`
1. `.env`にAWSのIAMの認証情報を記入
1. AWS ECRのpush先ホストも記入
1. `cp www/.env.example www/.env`

# 開発環境

1. `docker-compose up -d`
1. `docker-compose exec composer_workspace composer install`
1. `docker-compose exec node_workspace yarn`
1. `docker-compose exec node_workspace yarn prod`
1. permissionが怪しいので  
    `docker-compose exec php-fpm chown -R www-data:www-data .`
    
# 本番用コンテナ作る

1. `docker-compose -f ./docker-compose-deploy.yml build`
    - multi-stage buildで、JS/PHPコード入りphp-fpmコンテナを作る

# デプロイ

1. `docker-compose -f ./docker-compose-aws.yml up -d`
1. `docker-compose -f ./docker-compose-aws.yml exec dood sh`
1. `sh ~/ecr_register_images.sh`
1. AWS ECRにイメージプッシュされる

# AWS ECSタスク定義の更新とかタスクの実行とか

- 未整備


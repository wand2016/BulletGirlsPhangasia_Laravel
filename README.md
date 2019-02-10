# 最初にやるやつ

1. env_sampleを.envに
1. .envにAWSのIAMの認証情報を記入
1. `docker-compose -f setup.yml up -d`
1. `docker-compose -f setup.yml exec sh`
    - alpineベースのためbashがない
1. 以降すべてdindコンテナの中で作業する
1. `cd /root`
1. `./build-base-images.sh`
    - nginxやphp-fpm等のベースイメージをビルドする
    - ローカルのregistryにpushする
    
# 開発

1. `docker-compose up -d`

## PHPパッケージインストール

1. `docker-compose exec composer_workspace bash`
1. `composer install`
1. `exit`


## JSパッケージインストール

1. `docker-compose exec node_workspace bash`
1. `yarn`
    - windowsだと結構な確率で「Unexpected EOF」で死ぬが諦めないで


## JSビルド

1. 開発時は`yarn hot`
1. commit時は`yarn prod`


# 本番用コンテナビルド

1. `./build.sh`


# 本番用コンテナpush

1. `./deploy/ecr_register_images.sh`

# タスク登録とか

- 未整備






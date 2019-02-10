# 最初にやるやつ

1. `docker-compose -f setup.yml up -d`
1. `docker-compose -f setup.yml exec sh`
    - alpineベースのためbashがない
1. 以降すべてdindコンテナの中で作業する
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






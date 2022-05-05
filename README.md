# 結婚式参加者募集用アプリです。
docker + Laravel + Vue.jsで作りました。

# ローカルで起動まで
git clone https://github.com/HiroyukiAbe-bit/ep_app.git

## envファイルの作成
cp .env.example .env
vi .env

.envの中身を以下の内容に書き換え
WEB_PORT=80
DB_PORT=3306

DB_NAME=ep
DB_USER={ なんでもOK }
DB_PASSWORD={ なんでもOK }
DB_ROOT_PASSWORD={ なんでもOK }
保存したら以下を実行

## dockerイメージの作成
docker-compose build --no-cache

## dockerコンテナ起動〜composer installまで
docker-compose up -d
docker-compose exec app bash
composer install

## Laravelの.envファイル作成〜修正まで
cp .env.example .env
vi .env

DB_DATABASE=ep
DB_USERNAME={ 先ほど設定した名前 }
DB_PASSWORD={ 先ほど設定したパスワード }

## テーブル作成〜データのseedまで
php artisan migrate
php artisan db:seed

## localhostでアクセス
https://localhost:80 でページが表示される

※APP_KEYが必要と出たら画面上の「Ganerate」ボタンをクリックすると画面が正しく表示されます。


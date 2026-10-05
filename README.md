# laravel-docker-template

## アプリケーション名
　PiGLy

## 使用技術
    PHP 8.x
    Laravel 8.x
    Laravel Fortify
    MySQL 8.0
    Docker
    Docker Compose
    HTML
    CSS
    Git/Hub

## 機能一覧

    会員登録
    ログイン
    ログアウト

    体重記録の登録
    体重記録の一覧表示
    体重記録の詳細表示
    体重記録の編集
    体重記録の削除
    日付による体重データの検索

    目標体重の設定
    目標体重の更新
    現在の体重と目標体重の差の表示


## 環境構築
    Dockerコンテナを起動
    docker compose up -d --build

    Composerをインストール
    docker compose exec php composer install

    アプリケーションキーを作成
    php artisan key:generate

    マイグレーションを実行
    php artisan migrate


## URL
    開発環境: http://localhost/
    phpMyAdmin: http://localhost:8080/
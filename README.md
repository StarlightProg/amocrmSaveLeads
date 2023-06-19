Установка:
1) Создать .env
2) composer install
3) php artisan sail:install (затем выбрать psql)
4) ./vendor/bin/sail up
5) ./vendor/bin/sail artisan migrate

Для работы с API amocrm нужно установить в интеграции в поле "ссылка для перенапрвления" путь на /credentials для создания token.json

Для записи данных в БД надо перейти в /leads

Либо, в качестве примера, можно лично создать файл token.json в storage/app

Установка:
1) Создать .env
2) composer install
3) php artisan sail:install (затем выбрать psql)
4) ./vendor/bin/sail up
5) ./vendor/bin/sail artisan migrate

Для работы с API amocrm нужно установить в интеграции в поле "ссылка для перенапрвления" путь на /credentials для создания token.json

Для записи данных в БД надо перейти на /leads

Либо, в качестве примера, можно лично создать файл token.json в storage/app

Пример token.json который можно использовать:

{
    "token_type": "Bearer",
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjliNDMyYjVkZGM1OWZiY2E3NTI1M2UzYjZkYWFhZDVlZWYyOTk4ODMyZGExNDJmNmZmNDUwYzZlMzFjMmEyMzVkMWI1ZjIzYzM0OTQwYjk0In0.eyJhdWQiOiI1NWNhZDMzZi1mNTc4LTQxMGItOTA4Ni04NmZmZGRkMzcwMTMiLCJqdGkiOiI5YjQzMmI1ZGRjNTlmYmNhNzUyNTNlM2I2ZGFhYWQ1ZWVmMjk5ODgzMmRhMTQyZjZmZjQ1MGM2ZTMxYzJhMjM1ZDFiNWYyM2MzNDk0MGI5NCIsImlhdCI6MTY4MTY3NzcxMywibmJmIjoxNjgxNjc3NzEzLCJleHAiOjE2ODE3NjQxMTMsInN1YiI6Ijk1MDA3MzQiLCJhY2NvdW50X2lkIjozMTAwMzg5MCwiYmFzZV9kb21haW4iOiJhbW9jcm0ucnUiLCJzY29wZXMiOlsicHVzaF9ub3RpZmljYXRpb25zIiwiZmlsZXMiLCJjcm0iLCJmaWxlc19kZWxldGUiLCJub3RpZmljYXRpb25zIl19.dpKwGzdv0L3Y4P_Z_ZM5SHjn9B_OYUJnGUFKSyHPHCMw1dtDEzfW1-SRi06sKruZJUiY5wD0ohIpCpS64eEEQ2pMIMAHAq7LVZOwr0b7B3hJ3m6UQ4ciojZ0EAMfcUmL1IM94InH65jZhP8UbIUAlkFLaJiQNcptmhd1io67_dFHX6OzFN7V5CDKhk-oNwGLuFC7ke2nE2pZfYLdWxnIjxF1jEH047Ub1aElfos7TpHMSiSNkJh_ED_Na1PfZ5SCuauU3-0g4tew5YiZincqTp2BzAdsyk_KeDI5FkSEjmSA_JaHW9NRFtLpC_vcSkZjenosp-DNvm4zmIBHuiDkWQ",
    "refresh_token": "def50200dd9cadebbf1b640ec7f1da7ecb11240e9344caab38817fc8c83e8461b6979dcb68da4cb2f952bbdc13f2c0e50e67d422e7617a899da7d5b04dd134dd6bfcd93fee553a93c5fb4bef96cc1dca985279ce90b5822c651107eb581739e383eae6557dcf8cfade46a0dfc0fb75e5537ff6c6de107c9036aac3115163c6b43b907b5e403ce85e9b3d022253dc12caccb861eaac545252adaab2939675633c9b64608ddc6707b9f6affa4bf50aec70df72d786fa4416c9763fe6d55e0f8a203dd06ca10cab6d10f92fd3c3985875314a3ae4f449dfc94f74282f62874d609ae46b23ca7a4339d5fdebab2b38383577ac1a1540e2e7b0afe853577478b2b84c0c3073507f0427b270b4cd64201cb38311e5e13c5a95f6fa1e32b9dbc8d2dff0d4e5a5ea688e3ef25cb983200730ae6541e2ccfd87d8ae8ceee00255ff9cfd5aed8ea0ca3492b4321d007cef3b3a118b5b13b5643b8253a47cd4d03e82848e7f24c194c51f94d9c928eb5fb7c2d6f6dde25ceacaf2aa3c12fc0191bdf7b969e4f11229d7cfc32876f13f914fc9b5f2113f60ec0144d988f534d5a200114f616e6ecfcbc222b4ee59579c39d4926d9fc50fdb0f9bd295d8be5403ea58c5b65252c15adc55651a2e587c3f878c486efa959250bbbf06ac5e0cf00b1c7727cd93ab3a",
    "expires": 1681764113
}

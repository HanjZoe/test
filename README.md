# Блог на laravel

##  <a id="title1">Порядок действий  </a>

Переименовать .env.test в .env

В .env настроить подключение к базе данных

Выполнить следующие команды

```
composer install

php artisan key:generate

php artisan optimize

php artisan storage:link

php artisan migrate 

php artisan db:seed
    
    Создаются 2 пользователя 
    
    email: admin@admin.kz
    пароль: password
    роль: Админ
    
    email: user@user.kz
    пароль: password
    роль: Читатель
    
php artisan serve 

php artisan queue:work1
```


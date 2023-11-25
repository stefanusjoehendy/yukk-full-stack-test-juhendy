# YUKK TEST FULLSTACK (JUHENDY)

preparation :
- Create manual database Mysql or MariaDB with name "yukk"

For running this application : 

First step :

```
composer install

yarn install

php artisan migrate

php artisan db:seed --class=Mst_TranstypeSeeder

php artisan db:seed --class=UsersTableSeeder

```

If there's problem in first step, please download this project :
(https://drive.google.com/drive/folders/1gpLl0PJoHAv9VtUGI7D608wf42ff_q7k?usp=sharing)

Second step :
- php atisan serve
- yarn dev


Default User :

- Username => admin
- Password => 123456

For Register new user :
- http://127.0.0.1:8000/register
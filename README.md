# YUKK TEST FULLSTACK (JUHENDY)

preparation :
- Create manual database name "yukk"

For running this application : 
composer install
yarn install
php artisan migrate
php artisan db:seed --class=Mst_TranstypeSeeder
php artisan db:seed --class=UsersTableSeeder
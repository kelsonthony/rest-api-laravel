# rest-api-laravel
# deploy
https://www.treinaweb.com.br/blog/como-colocar-uma-aplicacao-laravel-em-producao-e-automatizar-o-processo-de-deploy/ 

rest-api-laravel

composer  create-project laravel/laravel contacts

criar a database.slite em database


.env

DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=\wamp64\www\kelsonthony\rest-api-laravel\contacts\database\database.sqlite
DB_USERNAME=
DB_PASSWORD=

Migrations 

php artisan make:migration create_contacts
fica em databases/migrations


$table->string('name');
$table->string('email')->unique();

php artisan migrate

php artisan make:controller ContactController --model=Contact

to check routes

php artisan route:list


levantar server

php artisan serve

http://127.0.0.1:8000/api/contacts

php artisan tinker

$contacts = \App\Contact::all()
=> Illuminate\Database\Eloquent\Collection {#3957
     all: [],

 $contacts = \App\Contact::create(['name' => 'Kelson Anthony', 'email' => 'k.thony@gmail.com'])


 listar os usuário

 $contacts = \App\Contact::all()

 


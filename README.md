## Projeto de teste de admissão Codificar - Oficina

This project was created during a job admission test. This project creates and lists estimates to garage shop services.
The app is done using mainly laravel as back-end/front-end with help from a simple design framework: UIKit.

The main class is called Estimate, validations requests and migrations are done in separate files in accordance to the usual laravel files convention.
You need to set the .env with database credentials to migrate the database
PHP, Laravel and composer need to be installed.

------------------------------

Esse projeto foi criado durante um teste para trabalho. Esse app cria e lista orçamentos para serviços de uma oficina. Foi utilizado o Laravel na maioria do código
do sistema com o auxílio de um framework de layout, o UIKit.
A classe principal é chamada de Estimate, as validações e migrações estão em suas devidas pastas, de acordo com a convenção de costume do Laravel.
É necessário ter o php, laravel e composer instalado para configurar o app.

------------------------------

#### install dependencies
```
composer install
```

#### Generate application key (need to copy .env.example to .env)
```
php artisan key:generate
```

Once copied env file, change database credentials and database name to match your db configs

#### db migrations
```
php artisan migrate --seed
```

#### serve app
```
php artisan serve
```
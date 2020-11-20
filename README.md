## Projeto de teste de admissão Codificar - Oficina

This project was created during a job admission test. This project creates and lists estimates to garage shop services.
The app is done using mainly laravel as back-end/front-end with help from a simple design framework: UIKit.

The main class is called Estimate, validations requests and migrations are done in separate files in accordance to the usual laravel files convention.
You need to set the .env with database credentials to migrate the database
PHP, Laravel and composer need to be installed.

#### db migrations
```
php artisan migrate --seed
```
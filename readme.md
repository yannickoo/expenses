# Expenses – A [Laravel](http://laravel.com/) + [AngularJS](https://angularjs.org/) demonstration

I wanted to build a small AngularJS application with the possibility to track expenses. Later I noticed that a backend is necessary for this project so I decided to use Laravel for that part.

## Installation

To install this application just follow the steps:

1. Clone the repo and execute ``composer update``
2. Create a new database and customize database credentials in ``app/config/database.php``
3. Run ``php artisan migrate`` to execute all migrations
4. Run ``php artisan db:seed`` to put in some demo data into the application
5. Run ``php artisan serve`` and enjoy your new AngularJS application on [http://localhost:8000](http://localhost:8000)
6. Now you can login with ``admin`` as username and ``admin`` as password
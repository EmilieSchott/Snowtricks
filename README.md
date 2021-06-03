# A collaborative website to share informations and tricks about snowboard figures

## Installation
----------------

1) Clone this repository.

2) With a CLI, place you in the project folder and run "composer install" command.

3) In .env, choose your SGBD by remove the # before the DATABASE_URL required and complete asked informations. Then, type "php bin/console doctrine:database:create" in the CLI to create the database.

4) To create tables in the database, type in CLI : "symfony console doctrine:migrations:migrate" 

5) Check fixtures directory to decide which fixtures you want in your database, then type in CLI : "php bin/console hautelook:fixtures:load".

## Copyrights
-------------

All images and pictures in public/upload/photos are under domain public.



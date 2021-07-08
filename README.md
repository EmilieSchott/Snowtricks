# A collaborative website to share informations and tricks about snowboard figures

[![Codacy Badge](https://api.codacy.com/project/badge/Grade/4f8ed1a6d3024dbcaf67ad00b54102a7)](https://app.codacy.com/gh/EmilieSchott/P6-Snowtricks?utm_source=github.com&utm_medium=referral&utm_content=EmilieSchott/P6-Snowtricks&utm_campaign=Badge_Grade_Settings)

## Installation
----------------

1) Clone this repository.

2) With a CLI, place you in the project folder and run "composer install" command.

3) In .env, choose your SGBD by remove the # before the DATABASE_URL required and complete asked informations. Then, type "php bin/console doctrine:database:create" in the CLI to create the database.

4) To create tables in the database, type in CLI : "symfony console doctrine:migrations:migrate" 

5) Check fixtures directory to decide which fixtures you want in your database and define an account login and password for you (user 1 in fixtures/User.yaml), then type in CLI : "php bin/console hautelook:fixtures:load".

6) Customize images and texts.

## Copyrights
-------------

All images and pictures in public/upload/photos are under domain public.



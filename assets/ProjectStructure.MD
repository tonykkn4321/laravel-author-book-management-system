# Project structure:
author-book-management-system/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── AuthorController.php
│   │       └── BookController.php
│   └── Models/
│       ├── Author.php
│       └── Book.php
├── config/
│   └── database.php
├── database/
│   └── migrations/
│       ├── xxxx_create_authors_table.php
│       └── xxxx_create_books_table.php
├── routes/
│   └── api.php
├── phpunit.xml
└── composer.json


# Commands:
composer create-project laravel/laravel .

# Make sure .env includes APP_KEY=
php artisan key:generate 
php artisan migrate

# To confirm Laravel is using MySQL locally:
php artisan tinker
>>> config('database.default')
>>> config('database.connections.mysql.database')

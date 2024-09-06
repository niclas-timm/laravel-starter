# Laravel Starter

This is a starter template for Laravel projects. All it does is glue together the packages you typically find in a Laravel project:

- Laravel Breeze
- Laravel Sanctum
- Laravel Pint
- Filament PHP
- Laravel IDE Helper
- PestPHP
- Laravel Backup
- Laravel Debugbar
- VsCode Setup

## Installation

1. Clone the repo
2. Create a `.env` file: `cp .env.example .env`
3. Install the dependencies: `composer install && npm i && npm run build`
4. Migrate the database: `php artisan migrate`
5. Create an admin user (optional): `php artisan user:make-admin-user`

You should now be able to use the page just like any other Breeze project. Plus, you can also visit the `/admin` route to access the Filament admin panel, which already has a user resource.

#TNET ASSIGMENT

### Install
1. Download the project (or clone using GIT)
2. Copy `.env.example` into `.env` and configure database credentials
3. Navigate to the project's root directory using terminal
4. Run `composer install`
5. Set the encryption key by executing `php artisan key:generate --ansi`
6. Run `php artisan migrate`
7. Run Seeder using `php artisan db:seed --class=ClassName` View the seeder folder

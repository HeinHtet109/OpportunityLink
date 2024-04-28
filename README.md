<p align="center"><img src="./public/assets/images/logo.png" width="300" height="300" alt="OpportunityLink Logo"></p>

## Installation instructions
### Requirements
- PHP: 8.0 or above
- MySQL: 5.2.0
- Composer

### Installation
- Make sure you have correct php setup. If you already have php enviroment, Skip `Xampp` Installation. 
- If you are not, we recommend to use `Xampp` to setup your php setup.

### Xampp Installation
- Download [Xampp](https://www.apachefriends.org/download.html) (PHP 8.0).
- Run Xampp Installer.

### Project Setup
- Create a database using MySQL.
- Move project folder to your php folder under htdocs folder. If you using `Xampp`, eg. xampp>htdocs>project_folder.
- In `.env` file inside of your project root, You need to set
    - Database Configuration
        ```php
            DB_HOST=127.0.0.1
            DB_PORT=3306
            DB_DATABASE=your_database_name
            DB_USERNAME=your_database_user
            DB_PASSWORD=your_database_password
            ...
        ```
    - Mail Configuration
        ```php
            MAIL_MAILER=smtp
            MAIL_HOST=your_mail_host
            MAIL_PORT=your_mail_port
            MAIL_USERNAME=mail_username
            MAIL_PASSWORD=mail_password
            MAIL_ENCRYPTION="tls or ssl"
            MAIL_FROM_ADDRESS=mail_username
            ...
        ```
      - Pusher Setup
            SignUp your acount at https://pusher.com/
        ```php
            PUSHER_APP_ID=your_pusher_id
            PUSHER_APP_KEY=your_pusher_key
            PUSHER_APP_SECRET=your_pusher_secret
            PUSHER_APP_CLUSTER=your_pusher_cluster
            ...
        ```    
- Run to setup database tables and columns structures
```php 
php artisan migrate --seed
```
- Run to Launch Project
```php 
php artisan serve
```
- You can now access your project at 
    - http://localhost:[port] eg. http://localhost:8000 (OR)
    - http://127.0.0.1:[port] eg. http://127.0.0.1:8000


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

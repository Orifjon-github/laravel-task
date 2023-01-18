<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Getting Started

## About Project

This project was created as a Technical Assignment for a Junior Backend Developer position. 

There are 2 roles in the project. Manager and Client. The Client creates an Application and sends it to the Manager. A client can create an application only once per day. All Applications will be sent to the Manager's Dashboard. The Manager can answer to them at any time. You can learn more about this after installing the project. Good Luck !

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/installation)

 Clone the repository

 `https://github.com/Orifjon-github/laravel-task.git`


 Install all the dependencies using composer

`composer install`

Copy the example env file and make the required configuration changes in the .env file

`cp .env.example .env`

Generate a new application key

`php artisan key:generate`

Run the database migrations **(Set the database connection in .env before migrating)**

`php artisan migrate`

Run the database seeder and you're done. 

**Note** : Note: It is recommended to have a clean database before planting. Clean up the database and seed the data at the same time by running the following command

`php artisan migrate:fresh --seed`

*Two accounts are created for use via seed*
- Email: manager@company.com, Password: secret
- Email: client@company.com, Password: secret


## Environment variables

`.env` - Environment variables can be set in this file

- DB_HOST = mysql
- MAIL_MAILER = log

**Note** : You can quickly set the database information and other variables in this file and have the application fully working.

## Final

`php artisan serve`

`npm install`

`npm run dev`

`php artisan queue:work`


## License

The Project software licensed under the [MIT license](https://opensource.org/licenses/MIT).

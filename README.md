<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Requirements
1. PHP > 8.X (this can be set from Devilbox)
2. NodeJs > 16.x
3. Composer > 2.x
4. Docker + Devilbox (Optional)

## Install (Laravel and VueJs3)
Run composer install<br>
Run npm install<br>
Copy .env.example to .env<br>
Configure .env file with your credentials for DB<br>
Go to config/tenancy.php add your local domain on central_domains

## Run the following commands
1. php artisan migrate
2. php artisan db:seed DatabaseSeeder ( Check database/seeders/UserSeeder if you want to change the default user )

## Project Structure

### Backend (Laravel 9)

- **app**
  - Console ( Place for commands )
  - Exceptions ( Custom exceptions )
  - Http 
    - Controllers are group by folder check example on "Controllers" folder
    - Middleware ( All rules for communication )
    - Requests ( All Custom Validation request )
  - Jobs
    - Create a job php artisan make:job TestJob ( This can be used on Commands see example on ImportUsersJobs )
  - Mail (Create custom trigger email with params , used for email templates)
  - Models (Audit + Tenant)
    - All models are incapsulated on folders
    - You can use Tenancy by use TenantTrait
    - If you want to have audit on actions just implement AuditableContract and use Auditable
  - Provides 
    - RouteServiceProvider 
      - Here you can add mapApiRoutes custom folder for your routes ( check example for that function )
  - Services
    - Services are group by folder check example on this
    - For a better way i use ActionsServices / Services ( for api call )
- **config**
  - all files for settings
- **database**
  - factories
  - migrations ( php artisan make:migration test_create_table )
  - seeders ( php artisan make:seeder TestSeeder , make sure you will add "Seeder" on name )
- **public**
  - Interface will be complied here automatic from FrontEnd **( DO NOT EDIT )**

### Frontend (VueJs 3 + Pinia)
- **resources**
  - css ( custom css files, can be added on webpack.mix.js -> resource )
  - fonts ( custom fonts files )
  - js ( Playground for views )
    - This folder have an arhitecture prebuild so you need to follow the following examples for modules
      - To be more easy just execute command for Create Module
      - Every module will be autoload by the system just follow the structure chapter
  
  ### Structure Modules
  - Since we use Pinia instead of VueX this change a little logic behing walls, see ***https://pinia.vuejs.org/***
    - Now stores are more easy to implement and transmit/manipulate information to other components
    - Example :
      - UserStore.js
  - Structure of folders:
    - components ( all views )
    - service ( all services needed for api calls or other actions )
    - store ( used to have a little controller for actions with services )
    - index.js ( this is the connector for autoload )
    - router.js ( all module routes based on path )

## Command Tools
Create Module on vue : php artisan vue:makeModule --route=test --module=Test<br>
Create Module on vue with children: php artisan vue:makeModule --module=test --route=test --children=child-new,child-edit
<br>
Create Module on Laravel : php artisan module:make Blog
<br>
Create Model from table : php artisan generate:modelfromtable --table=test --folder=Test 
Example of generate : php artisan generate:modelfromtable --table=app_config --folder=app\Models\App

Example of krLove : php artisan krlove:generate:model User --table-name=user<br>
Example of krLove : php artisan krlove:generate:model User --output-path=/full/path/to/output/directory --namespace=Your\\Custom\\Models\\Place


## Environments
    Stage : https://dev.webdirect.ro
    Pre-Production : https://preprod.webdirect.ro
    Production : https://prod.webdirect.ro

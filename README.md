## Mini CRM App

<p> 
This is a simple min-crm application consists of two models, Company and Employee and the relation between two models is one to many.
One Company has many Employees.
</p>

## Database Schema

<img src="https://user-images.githubusercontent.com/66916174/208264419-14c68654-7b3c-43d6-a4f7-d74dfaa1a219.PNG" width=600 />

## Pre-requisites tools versions to avoid any problem

-   PHP version 8.1.0
-   Laravel version ^9.19

## Steps for running project

### 1- Clone the project

```
git clone https://github.com/Elsayed93/pharmacies-products.git
```

<p>If you want SSL </p>

```
git clone git@github.com:Elsayed93/pharmacies-products.git
```

<br>

### 2- Make sure you are in the project directory and composer install

```
composer install
```

### 3- copy .env-example file and rename the copied file .env

### 4- Create Database and fill database credentials in .env file

### 5- Run migrate command

### 6- Generate App Key

```
cp .env-example .env

php artisan migrate

php artisan key:generate
```

### 7- npm install && npm run dev.

> Because We use Laravel 9 and it use Vit tool bundler by default. So To avoid vite manifest file not found error, Please run these commands: 

```
npm install
npm run dev
```

### 8- Run the server

```
php artisan serve
```

<p> 
We Store Company Logo image in storage/app/public/companies directory.
To make this directory accessible in public folder, Please run this command: 
</p>

```
php artisan storage:link
```

> Notice: Please Create the <ins>companies</ins> directory manually at the beginning and save default image for companies in it and rename this image <ins>company.png</ins> to render default images for companies.

## Factories and Seeders

<p> 
    - There is AdminSeeder to enable an admin to login.
    - There are another two seeders for Companies and Employees (For Testing Purposes), Feel free to seed data if you want to fill the application with fake data.
</p>


## THANK YOU :)

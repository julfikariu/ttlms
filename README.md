
## About

A simple learning management system task.

## Technologies used on this website:

- PHP
- Laravel
- Breeze
- JavaScript
- jQuery
- CSS
- Bootstrap 5
- HTML

## Installation

First clone this repository, install the dependencies, and setup your .env file.

```
git clone https://github.com/julfikariu/ttlms
composer update
cp .env.example .env
```

Then create the necessary database.

```
php artisan db
create database ttlms
```

And run the initial migrations and seeders.

```
php artisan migrate --seed
```
Then need to run this command.
```
php artisan key:generate
php artisan serve
```
Need update .env for payment process.


```
STRIPE_KEY=pk_test_51I...
STRIPE_SECRET=sk_test_51I....

PAYPAL_MODE=sandbox
PAYPAL_CURRENCY=USD
PAYPAL_SANDBOX_API_USERNAME=sb-8o9b
PAYPAL_SANDBOX_API_PASSWORD=password
PAYPAL_SANDBOX_API_SECRET=AV6QGl...
PAYPAL_SANDBOX_API_CERTIFICATE=
```
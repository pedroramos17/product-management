# Stock management

This project is a tutorial of the Laravel packages folio and volt, showing an app from scratch. The link: https://medium.com/@pedrosouza.skylabs/product-management-app-with-laravel-folio-and-volt-pt-1-50fdbed20540

## Why?
I like the Laravel ecosystem, and beyond learning with anyone's contributions, maybe I can help someone.

## Dependencies
* PHP 8.2
* PHP SQLite module
* Laravel 10
* Livewire v3
* Volt and Folio packages
* tailwindcss

## How to start

**In composer:**
 
 ```bash
 composer update
 ```

**With npm:**

```bash
npm i
```
**Copy .env.example to .env with:**
```bash
cp .env.example .env
```
To correct database config, see your .env file.

**Run migrations:**
```bash
php artisan migrate
```

**Run server:**
```bash
php artisan serve
```

**And run vite:**

```
npm run dev
```
<br>

Access the ``/products`` route
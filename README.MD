# 🐍🔁🐫 Laravel Snake-to-Camel Case Middleware

[![Packagist Version](https://img.shields.io/packagist/v/rizkussef/laravel-snake-to-camel-case.svg?style=flat-square)](https://packagist.org/packages/rizkussef/laravel-snake-to-camel-case)
[![Total Downloads](https://img.shields.io/packagist/dt/rizkussef/laravel-snake-to-camel-case.svg?style=flat-square)](https://packagist.org/packages/rizkussef/laravel-snake-to-camel-case)
[![License](https://img.shields.io/badge/license-MIT-green.svg?style=flat-square)](LICENSE)
[![Install with Composer](https://img.shields.io/badge/Install%20with-Composer-blue?style=flat-square&logo=composer)](https://packagist.org/packages/rizkussef/laravel-snake-to-camel-case)

---

## ✨ What is this?

A Laravel package that **automatically converts API keys** between `snake_case` and `camelCase`:  
✔ **Incoming Requests:** Converts `camelCase` → `snake_case` (for Eloquent models & DB consistency).  
✔ **Outgoing Responses:** Converts `snake_case` → `camelCase` (for React, Vue, or any frontend apps).

Perfect for **clean API responses** and **JavaScript-friendly keys**! 🚀

---

## ✅ Features

- 🔄 **Two-way conversion**: Request & Response.
    
- 🔍 Works on **nested arrays & JSON**.
    
- 🔗 Applies to **all routes or only API routes** (configurable).
    
- ⚡ **Plug & play** using Laravel’s **package auto-discovery**.
    
- 🛠 **Fully configurable** via `config/snake-to-camel.php`.
    

---

## 📦 Installation

Require the package via Composer:

```bash
composer require rizkussef/laravel-snake-to-camel-case
```

---

## ⚙️ Configuration

Publish the config file:

```bash
php artisan vendor:publish --tag=config
```

Then edit `config/snake-to-camel.php`:

```php
return [
    'convert_response' => true, // Enable snake_case → camelCase for responses
    'convert_request'  => true, // Enable camelCase → snake_case for requests
    'apply_to'         => 'all', // Options: 'all' | 'api' | 'web'
];
```

✅ You can also override these settings in `.env`:

```
SNAKE_TO_CAMEL_CONVERT_RESPONSE=true
SNAKE_TO_CAMEL_CONVERT_REQUEST=true
```

---

## 🔍 How It Works

### ✅ Example Request (Frontend → Laravel)

**Before:**

```json
{
    "firstName": "Rizk",
    "lastName": "Ussef"
}
```

**After Middleware (Laravel receives):**

```json
{
    "first_name": "Rizk",
    "last_name": "Ussef"
}
```

---

### ✅ Example Response (Laravel → Frontend)

**Before:**

```json
{
    "first_name": "Rizk",
    "last_name": "Ussef"
}
```

**After Middleware (Frontend receives):**

```json
{
    "firstName": "Rizk",
    "lastName": "Ussef"
}
```

---

## 🏗 Usage

No manual registration needed. Laravel auto-discovers the service provider:  
`Rizkussef\LaravelSnakeToCamelCase\Providers\SnakeToCamelServiceProvider`

The middleware automatically applies to:

- ✅ All routes (if `apply_to` = `all`)
    
- ✅ Only API routes (if `apply_to` = `api`)
    

---
## 📌 Requirements

- PHP 8.1+
    
- Laravel 10.x | 11.x
    

---

## 📄 License

This package is open-source under the **MIT license**.  
See [LICENSE](https://chatgpt.com/c/LICENSE) for details.

---

## ⭐ Support

If you like this package, please **star the repo** on [GitHub](https://github.com/rizkussef/laravel-snake-to-camel-case) ⭐  
Contributions and PRs are welcome!


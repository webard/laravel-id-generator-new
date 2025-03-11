
# Laravel ID Generator Factory

[![Latest Stable Version](https://img.shields.io/packagist/v/omaressaouaf/laravel-id-generator.svg)](https://packagist.org/packages/omaressaouaf/laravel-id-generator)
[![License](https://img.shields.io/github/license/omaressaouaf/laravel-id-generator)](LICENSE)
[![Tests](https://github.com/omaressaouaf/laravel-id-generator/actions/workflows/tests.yml/badge.svg)](https://github.com/omaressaouaf/laravel-id-generator/actions/workflows/tests.yml)

A Laravel package for generating **custom auto-incrementing IDs** with prefixes, suffixes, and date-based placeholders.

## 🚀 Features
- Auto-increment ID generation for any column.
- Allow custom prefixes & suffixes & padding
- Supports **{DATE}**, **{MONTH}**, and **{YEAR}** placeholders.

---

## 📥 Installation

Install via Composer:

```sh
composer require omaressaouaf/laravel-id-generator
```

For Laravel 9+, the package will be auto-discovered. Otherwise, register the service provider in `config/app.php`:

```php
'providers' => [
    Omaressaouaf\LaravelIdGenerator\IdGeneratorServiceProvider::class,
],
```

---

## 📌 Usage

### Basic Example
Generate an ID with a **prefix and suffix and padding**:

```php
use Omaressaouaf\LaravelIdGenerator\IdGenerator;
use App\Models\User;

$id = IdGenerator::generate(User::class, 'column_name', 5, 'INV-', '-2024');

echo $id; // USR-00001-2024
```

### Dynamic Placeholders
- `{DATE}` → `2025-02-28`
- `{MONTH}` → `2025-02`
- `{YEAR}` → `2025`

```php
$id = IdGenerator::generate(Invoice::class, 'column_name', 5, 'INV-{YEAR}-');
echo $id; // INV-2025-00001
```

---

## 🛠️ Testing

Run unit tests:

```sh
composer test
```

---

## 📜 License

This package is licensed under the [MIT License](https://github.com/omaressaouaf/laravel-id-generator/blob/master/LICENSE).

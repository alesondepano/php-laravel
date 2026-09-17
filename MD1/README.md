# AD System — CodeIgniter 4 Laboratory Exercise

AD System is a four-page Point-of-Sale demonstration built with CodeIgniter 4. It focuses on routes, controllers, views, and MVC organization before a database is introduced.

## Features

- Landing page at `/`
- Project information at `/about`
- Customer Accounts page at `/customers`
- User Accounts page at `/users`
- Five sample customer records stored in a PHP array
- Five sample staff records stored in a PHP array
- Shared responsive layout and navigation
- No database required

## Requirements

- PHP 8.2 or newer
- Composer
- PHP extensions: `intl` and `mbstring`
- CodeIgniter's local development server using PHP 8.2 or newer

## Installation

1. Clone or download the project.
2. Open a terminal in the project directory.
3. Install the PHP dependencies:

   ```bash
   composer install
   ```

4. Copy `env` to `.env` if `.env` is not present.
5. Set the development-server base URL in `.env`:

   ```ini
   CI_ENVIRONMENT = development
   app.baseURL = 'http://localhost:8080/'
   app.indexPage = ''
   ```

6. Start the application from the project directory:

   ```bash
   php spark serve
   ```

7. Visit `http://localhost:8080/`.

## PHP Version Note

CodeIgniter 4.7 requires PHP 8.2 or newer. This computer's XAMPP installation uses PHP 8.0.28, so opening the project through XAMPP's Apache URL produces a PHP version error. The `php` command in the terminal uses PHP 8.5 and is compatible with this project.

Confirm the terminal PHP version with:

```bash
php -v
```

Do not use `http://localhost/php-laravel/MD1/public/` unless XAMPP is upgraded to a release containing PHP 8.2 or newer.

## Project Structure

```text
app/
├── Config/Routes.php
├── Controllers/
│   ├── Pages.php
│   ├── Customers.php
│   └── Users.php
└── Views/
    ├── layouts/main.php
    ├── pages/home.php
    ├── pages/about.php
    ├── customers/index.php
    └── users/index.php
public/
└── assets/css/style.css
```

The `Customers` and `Users` controllers create temporary static arrays and pass them to their corresponding views. Each listing view uses `foreach` to render the records. These arrays can be replaced with model/database results in a future version.

## Routes

| Method | Route | Controller method | Purpose |
| --- | --- | --- | --- |
| GET | `/` | `Pages::index` | Landing page |
| GET | `/about` | `Pages::about` | Project information |
| GET | `/customers` | `Customers::index` | Customer account listing |
| GET | `/users` | `Users::index` | User account listing |

## Verification

List the registered routes:

```bash
php spark routes
```

Run the automated test suite:

```bash
composer test
```

## Production Deployment

1. Point the hosting document root to the project's `public/` directory.
2. Run `composer install --no-dev --optimize-autoloader` on the server.
3. Copy `.env.example` to `.env`.
4. Set `CI_ENVIRONMENT = production` and replace `app.baseURL` with the public HTTPS URL.
5. Ensure the web server can write to the `writable/` directory.
6. Confirm `/`, `/about`, `/customers`, and `/users` return successful responses.

The real `.env`, installed dependencies, test output, and runtime files are excluded through `.gitignore`. The supplied `.env.example` documents the production configuration without exposing environment-specific values.

No database export is included in this version because the laboratory activity explicitly uses static PHP arrays and does not connect to a database.

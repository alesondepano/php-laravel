# AD System

AD System is a four-page Point-of-Sale demonstration built with CodeIgniter 4. The customer and user directories use MySQL tables and CodeIgniter Models to retrieve records with Query Builder.

## Requirements

- PHP 8.2 or newer
- Composer
- MySQL or MariaDB
- PHP extensions `intl`, `mbstring`, and `mysqli`

## Setup

1. Install dependencies:

   ```bash
   composer install
   ```

2. Start MySQL and confirm the credentials in `.env`. The default local configuration is:

   ```ini
   database.default.hostname = localhost
   database.default.database = ad_system
   database.default.username = root
   database.default.password =
   database.default.DBDriver = MySQLi
   database.default.port = 3306
   ```

3. Create the `ad_system` database in phpMyAdmin or MySQL first. Then create the tables and sample records with either option:

   ```bash
   php spark migrate
   php spark db:seed PosSeeder
   ```

   Or import [`database/pos.sql`](database/pos.sql) into MySQL.

4. Start the application:

   ```bash
   php spark serve
   ```

5. Open `http://127.0.0.1:8080/`.

## Routes

| Route | Purpose |
| --- | --- |
| `/` | Landing page |
| `/about` | Project information |
| `/customers` | Customer Accounts loaded by `CustomerModel` |
| `/users` | User Accounts loaded by `UserModel` |

## Project structure

- `app/Config/Routes.php` contains the four routes.
- `app/Controllers/` prepares page data.
- `app/Models/CustomerModel.php` and `app/Models/UserModel.php` access the database tables.
- `app/Database/Migrations/` creates the `customers` and `users` tables.
- `app/Database/Seeds/PosSeeder.php` inserts sample records.
- `app/Views/` contains the shared layout and page views.
- `database/pos.sql` is the database export required for submission.

## Verification

Run the automated tests with:

```bash
composer test
```

The test suite uses an isolated SQLite database and verifies that both directory pages retrieve and display seeded records through their Models.

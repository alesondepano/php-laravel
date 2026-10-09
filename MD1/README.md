# Tasks for Today Management System

Tasks for Today is a CodeIgniter 4 database-backed task-management system for IT0049 Web System Technologies.

## Requirements

- PHP 8.2 or newer
- Composer
- MySQL or MariaDB
- PHP extensions `intl`, `mbstring`, and `mysqli`

## Setup

1. Start MySQL and confirm the database settings in `.env`.
2. Create the `ad_system` database in phpMyAdmin, or import `database/tasks.sql`.
3. Run the migrations and task-management seeder:

   ```bash
   php spark migrate
   php spark db:seed TaskManagementSeeder
   ```

   The seeder creates 8 tasks across 4 dates, including today, and exactly one demo user.

4. Start the application:

   ```bash
   php spark serve
   ```

5. Open the URL shown in the terminal, for example `http://localhost:8080/`.

## Required pages

| Route | Purpose |
| --- | --- |
| `/` | Welcome dashboard showing only tasks scheduled for today |
| `/tasks` | Complete task list ordered by task date |
| `/profile` | Single demo user profile loaded through `UserModel` |
| `/about` | Static developer and system information |

## Project structure

- `app/Models/TaskModel.php` contains the date-filtered and ordered queries.
- `app/Models/UserModel.php` accesses the demo user record.
- `app/Controllers/Pages.php` prepares the Welcome and About pages.
- `app/Controllers/Tasks.php` prepares the full Task List page.
- `app/Controllers/Profile.php` prepares the Profile page.
- `app/Database/Migrations/` creates the task schema and adds `users.email` when upgrading the previous project.
- `app/Database/Seeds/TaskManagementSeeder.php` inserts the required sample data.
- `database/tasks.sql` is the database export for submission.
- `public/uploads/avatars/` stores prepared user avatar thumbnails; only the filename is saved in the database.

## TFA3 forms and uploads

- `/customers/new` creates a validated customer.
- `/customers/edit/{id}` updates an existing customer.
- `/users/new` creates a validated user with a unique username.
- `/users/edit/{id}` updates a user and accepts a JPG or PNG avatar up to 2MB.

If you imported an older database export, add the new avatar column once in phpMyAdmin:

```sql
ALTER TABLE users ADD COLUMN avatar VARCHAR(255) NULL;
```

## Verification

Run the tests with:

```bash
vendor/bin/phpunit --no-coverage
```

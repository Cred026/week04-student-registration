# Database Setup

Laravel 13 already defines both `sqlite` and `mariadb` connections in `config/database.php`. Select the connection through `.env`; do not place credentials in source code or commit `.env`.

## Use SQLite for Development

The repository currently uses SQLite. For a new checkout, the normal setup command creates the environment file, application key, database, and schema:

```bash
composer run setup
```

For manual setup, ensure `.env` contains:

```dotenv
DB_CONNECTION=sqlite
```

Then create the file if it is absent and run the migrations:

```bash
touch database/database.sqlite
php artisan config:clear
php artisan migrate
php artisan migrate:status
```

Do not delete `database/database.sqlite` if it contains records you need.

## Switch to MariaDB

### 1. Install the prerequisites

Install and start MariaDB using your operating system's package manager. PHP must also have the MySQL PDO driver, commonly supplied by a package named `php-mysql`, `php8.5-mysql`, or `php-mysqlnd`.

Verify both services before continuing:

```bash
mariadb --version
php -m | grep -i pdo_mysql
```

Restart the PHP or web-server process after enabling the extension.

### 2. Create an application database and user

Open the MariaDB client as an administrator:

```bash
sudo mariadb
```

Create dedicated local credentials, replacing the example password:

```sql
CREATE DATABASE `cabigan_week4`
    CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'cabigan_week4'@'127.0.0.1'
    IDENTIFIED BY 'replace-with-a-strong-password';
GRANT ALL PRIVILEGES ON `cabigan_week4`.*
    TO 'cabigan_week4'@'127.0.0.1';
FLUSH PRIVILEGES;
```

### 3. Update the local environment

Replace the SQLite database section in `.env` with:

```dotenv
DB_CONNECTION=mariadb
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cabigan_week4
DB_USERNAME=cabigan_week4
DB_PASSWORD=replace-with-a-strong-password
```

Apply and verify the new configuration:

```bash
php artisan config:clear
php artisan config:show database.default
php artisan migrate
php artisan migrate:status
```

`database.default` should report `mariadb` and every migration should report `Ran`.

## Existing SQLite Data

Running `php artisan migrate` creates an empty MariaDB schema; it does not copy SQLite rows. Back up `database/database.sqlite` before switching. If existing records must be retained, export and transform them separately or create a reviewed one-time import process after the schemas match.

To switch back, restore `DB_CONNECTION=sqlite`, remove or comment the MariaDB variables, and run `php artisan config:clear`.

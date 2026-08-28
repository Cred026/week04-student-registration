# Project Documentation

This directory provides a shorter, task-oriented view of the Week 4 laboratory assignment. The original [`INSTRUCTIONS.md`](../INSTRUCTIONS.md) remains the authoritative source for submission and grading requirements.

## Guides

- [`project-requirements.md`](project-requirements.md) summarizes the application, documentation, portfolio, and submission requirements.
- [`database-setup.md`](database-setup.md) explains the current SQLite setup and the later switch to MariaDB.

## Current Development Choice

The assignment specifies MySQL-compatible storage. For local development, this repository currently uses SQLite: `.env.example` sets `DB_CONNECTION=sqlite`, Laravel defaults to SQLite, and `database/database.sqlite` is present. MariaDB can be enabled later without changing application code; follow the database guide before switching.

## Quick Start

Install the project and prepare the SQLite database:

```bash
composer run setup
```

Start Laravel, the queue worker, logs, and Vite through the repository's development script:

```bash
composer run dev
```

Run the project checks with:

```bash
composer run test
```

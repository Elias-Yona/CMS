## CMS

- A courier Management System

## SETUP

1. Install `symfony` binary
2. Check project requirements by running:

```bash
symfony check:requirements
```

3. Install project dependencies:

```bash
composer install
```

4. Apply database migration files to your database:

```bash
symfony doctrine:migrations:migrate
```

5. Spinup dev docker containers. Make sure you have docker installed

```bash
docker compose up -d
```

6. Start up the development server

```bash
symfony server:start -d
```

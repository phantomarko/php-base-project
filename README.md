PHP Base Project
===

## Requirements

- PHP 8.3 and its extensions
- Symfony CLI 5
- Docker 24 and Docker Compose 2
- Composer 2

## Characteristics

**Architecture**
- SOLID
- DDD
- Hexagonal Architecture

**Packages**
- Symfony (base framework)
  - Router
  - Dependency injection
  - HTTP requests and responses
- Doctrine
  - ORM
  - Migrations

**Tools**
- Tests
  - PHPUnit
- Analysis
  - Psalm
  - PHP Code Sniffer
- Git
  - Captain hook

**Environment**
- Docker
  - MySQL
  - Adminer
- Symfony CLI
  - Web server 

## Set Up

1. Create a copy of `.env.example` as `.env` and assign a value to `APP_SECRET`
    ```shell
    cp .env.example .env
    ```

2. Install composer dependencies
    ```shell
    composer install
    ```

3. Build and start docker containers
    ```shell
    docker compose build --no-cache --pull && docker compose up -d
    ```
   
4. Execute all DB migrations.
    ```shell
    php bin/console doctrine:migrations:migrate
    ```

5. Start web server
    ```shell
    symfony server:start
    ```
   
6. Access the web server or the containers using 127.0.0.1 or the machine IP as host
    - API. http://172.18.91.172:8000/api/doc
    - Adminer. http://172.18.91.172:8080/?server=db&username=Us3r&db=storage

## Environment Handbook

### Docker

Build
```shell
docker compose build --no-cache --pull
```

Start
```shell
docker compose up -d
```

Stop
```shell
docker compose down --remove-orphans
```

Prune
```shell
docker system prune -a --volumes
```

### Migrations

Execute all
```shell
php bin/console doctrine:migrations:migrate
```

Generate
```shell
php bin/console doctrine:migrations:generate
```

Execute one or more
```shell
php bin/console doctrine:migrations:execute --up 'DoctrineMigrations\{MIGRATION_CLASS}'
```
```shell
php bin/console doctrine:migrations:execute --down 'DoctrineMigrations\{MIGRATION_CLASS}'
```

### Symfony CLI

Start server
```shell
symfony server:start
```

Install and uninstall CA certificates to allow https
```shell
symfony server:ca:install
```
```shell
symfony server:ca:uninstall
```

### Code quality

Analyze and test project (psalm, phpcs and phpunit)
```shell
composer code:check
```

Run Psalm
```shell
./vendor/bin/psalm --no-cache
```

Run PHP Code Sniffer
```shell
./vendor/bin/phpcs --no-cache
```

Run PHPUnit
```shell
./vendor/bin/phpunit
```
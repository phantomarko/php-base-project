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

**Components**
- Symfony (base framework)
  - Router
  - Dependency injection
  - HTTP requests and responses
- Doctrine
  - ORM
  - Migrations
- Tactician
  - Command and query bus
  - Doctrine transactions
- Nelmio API Doc
  - Expose API documentation via web

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

## Developer Handbook

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
docker compose down
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

## To-do

### Components and architecture
* [ ] Format error response to JSON
* [ ] Extract response formatting to requests Symfony subscribers to decouple format from controllers
* [ ] Refactor DI to decouple it from the base framework
* [ ] Find a decoupled way to expose an API doc using OAS
* [ ] Validate requests against OAS

### Environment and data
* [ ] Automatically insert fixtures after execute migrations or insert via console command (`docker exec` workaround)
* [ ] Use Docker as web server instead of Symfony CLI

### Endpoints and business logic
* [ ] Move Console to proper UI folder
* [ ] Add Console controller to create a Specie
* [ ] Remove API controller to create a Specie
* [ ] Add use case and Console controller to delete a Specie
* [ ] Add use case and API controller to get a Specie
* [ ] Add use case and API controller to list Species
* [ ] Add filters to list Species
* [ ] Guard against existing Specie with given identifier
* [ ] Guard against existing Specie with given name
* [ ] Add Pokemon mapping and custom types
* [ ] Add use case and API controller to create a Pokemon
* [ ] Add use case and API controller to edit a Pokemon
* [ ] Add use case and API controller to delete a Pokemon
* [ ] Add use case and API controller to get a Pokemon
* [ ] Add use case and API controller to list Pokemon
* [ ] User and Authentication
* [ ] Trainer extending from User
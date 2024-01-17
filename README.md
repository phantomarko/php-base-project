PHP Base Project
===

## Requirements

- PHP 8.3 and its extensions
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
  - Nginx
  - PHP-FPM
  - MySQL
  - Adminer

## Set Up

1. Create a copy of `.env.example` as `.env` and assign values to `APP_SECRET` and `MYSQL_ROOT_PASSWORD`
    ```shell
    cp .env.example .env
    ```

2. Build and start docker containers
    ```shell
    docker compose build --no-cache --pull && docker compose up -d
    ```

3. Install composer dependencies
    ```shell
    docker exec php sh -c 'composer install'
    ```

4. Execute all DB migrations.
    ```shell
    docker exec php sh -c 'php bin/console doctrine:migrations:migrate -n'
    ```

5. (Optional) Import seeds.
    ```shell
    docker exec -i mysql sh -c 'exec mysql -uroot -p"$MYSQL_ROOT_PASSWORD" storage' < seeds/storage.sql
    ```
   
6. Access the web server or the containers using 127.0.0.1 or the machine IP as host
    - API. http://172.18.91.172:8000/api/doc
    - Adminer. http://172.18.91.172:8080/?server=mysql&username=root&db=storage

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

Access container shell
```shell
docker compose exec {CONTAINER_NAME} bash
```

Execute command from outside the container
```shell
docker exec -i {CONTAINE_NAME} sh -c '{COMMAND}'
```

Prune
```shell
docker system prune -a --volumes
```

### Seeds

Generate
```shell
docker exec mysql sh -c 'exec mysqldump storage species --no-create-info --compact -uroot -p"$MYSQL_ROOT_PASSWORD"' > seeds/storage.sql
```

Import
```shell
docker exec -i mysql sh -c 'exec mysql -uroot -p"$MYSQL_ROOT_PASSWORD" storage' < seeds/storage.sql
```

### Migrations

_(These commands have to be executed inside the PHP container or outside using `docker exec`)_

Execute all
```shell
php bin/console doctrine:migrations:migrate -n
```

Generate
```shell
php bin/console doctrine:migrations:generate
```

### Code quality

_(These commands have to be executed inside the PHP container or outside using `docker exec`)_

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
* [ ] Create command to wrap the migrations execution
* [ ] Create commands to wrap the import/generation of the seeds
* [ ] Optimize docker containers and config

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
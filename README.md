PHP Base Project
===

## Characteristics 📚

**PHP** project template based on **Symfony** skeleton with several components and tools ready to build a solid application. The project follows **good practices** and **clean architectures** to ensure the code quality. It brings a development environment built with **Docker** and **Docker Compose** that contains all the necessary components to reduce the number of external dependencies.

- **Architecture and Design**
  - SOLID
  - DDD
  - Hexagonal Architecture

- **Components**
  - Project Skeleton > Symfony
  - Routing > Symfony
  - Dependency Injection > Symfony
  - Request and Responses > Symfony
  - CQRS > League Tactician
  - ORM > Doctrine
  - Migrations > Doctrine Migrations
  - API Doc > Nelmio API Doc

- **Tools**
  - Unit Tests > PHPUnit
  - Analysis > Psalm & PHP Code Sniffer
  - Git Hooks > Captain hook

- **Docker Environment**
  - Web server > NGINX & PHP-FPM images
  - Database > MySQL & Adminer (Management tool)

## Requirements ✅

The project only requires to have installed **Docker** and **Docker Compose** in order to start working on it.

## Set Up ⚙️

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
   
6. Use the desired service.
    - API. http://localhost:8000/api/doc
    - Adminer. http://localhost:8080/?server=mysql&username=root&db=storage

## Developer Handbook 📖

### Docker 🐋

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

### Seeds 🌱

Generate
```shell
docker exec mysql sh -c 'exec mysqldump storage species --no-create-info --compact -uroot -p"$MYSQL_ROOT_PASSWORD"' > seeds/storage.sql
```

Import
```shell
docker exec -i mysql sh -c 'exec mysql -uroot -p"$MYSQL_ROOT_PASSWORD" storage' < seeds/storage.sql
```

### Migrations 💾

_(These commands have to be executed inside the PHP container or outside using `docker exec`)_

Execute all
```shell
php bin/console doctrine:migrations:migrate -n
```

Generate
```shell
php bin/console doctrine:migrations:generate
```

### Code quality 🔍

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

## To-Do List 📃

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
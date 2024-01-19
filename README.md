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

Open [developer-handbook.md](docs/developer-handbook.md)

## To-Do List 📃

Open [to-do.md](docs/to-do.md)
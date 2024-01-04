PHP Base Project
===

## Requirements

- PHP 8.3 and its extensions
- Symfony CLI 5
- Docker 24 and Docker Compose 2
- Composer 2

## Project Features

Source:
- Symfony as base framework
  - Router
  - Dependency injection
  - HTTP requests and responses
- Doctrine
  - ORM
  - Migrations

Tools:
- Tests
  - PHPUnit
- Analysis
  - Psalm
  - PHP Code Sniffer
- Git
  - Captain hook

Environment:
- Docker
  - MySQL
  - Adminer
- Symfony CLI
  - Web server 

## Set Up

1. Install composer dependencies
    ```shell
    composer install
    ```

2. Build and start docker containers
    ```shell
    docker compose build --no-cache --pull && docker compose up -d
    ```

3. Start web server
    ```shell
    symfony server:start
    ```
   
4. Access the web server or the containers using 127.0.0.1 or the machine IP as host
    - Web. http://172.18.91.172:8000
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

### Symfony Console

See routes
```shell
php bin/console debug:router
```

List doctrine commands
```shell
php bin/console list doctrine
```

### Tools

Analyze and test project
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
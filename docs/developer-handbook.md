Developer Handbook 📖
==

List of useful commands during the development. Some of them could be executed inside the PHP container or outside using `docker exec`.

## Docker 🐋

### Build
```shell
docker compose build --no-cache --pull
```

### Start
```shell
docker compose up -d
```

### Stop
```shell
docker compose down
```

### Use container console
```shell
docker compose exec CONTAINER_NAME bash
```

### Run command from outside the container
```shell
docker exec -i CONTAINE_NAME sh -c 'COMMAND'
```

### Prune all the data
```shell
docker system prune -a --volumes
```

## Seeds 🌱

### Generate
```shell
docker exec mysql sh -c 'exec mysqldump storage species --no-create-info --compact -uroot -p"$MYSQL_ROOT_PASSWORD"' > seeds/storage.sql
```

### Import
```shell
docker exec -i mysql sh -c 'exec mysql -uroot -p"$MYSQL_ROOT_PASSWORD" storage' < seeds/storage.sql
```

## Migrations 💾

### Execute all
```shell
php bin/console doctrine:migrations:migrate -n
```
```shell
docker exec php sh -c 'php bin/console doctrine:migrations:migrate -n'
```

### Generate
```shell
php bin/console doctrine:migrations:generate
```
```shell
docker exec php sh -c 'php bin/console doctrine:migrations:generate'
```

## Code quality 🔍

### Analyze code and run tests
```shell
composer code:check
```
```shell
docker exec php sh -c 'composer code:check'
```

### Run Psalm
```shell
./vendor/bin/psalm --no-cache
```
```shell
docker exec php sh -c './vendor/bin/psalm --no-cache'
```

### Run PHP Code Sniffer
```shell
./vendor/bin/phpcs --no-cache
```
```shell
docker exec php sh -c './vendor/bin/phpcs --no-cache'
```

### Run PHPUnit
```shell
./vendor/bin/phpunit
```
```shell
docker exec php sh -c './vendor/bin/phpunit'
```
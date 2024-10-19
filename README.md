# Doctrine Mapping for Money PHP

```shell
git clone git@github.com:vudaltsov/money-php-doctrine-mapping.git
cd money-php-doctrine-mapping
composer install
docker compose up -d
bin/console doctrine:schema:update --force
bin/console doctrine:schema:validate
bin/console demo
```

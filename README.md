# WGTCRM Backend

## Patterns used

 * [PSR-2 Coding Standard](https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md)

 * [GraphQL pattern](https://graphql.org) (package: [nuwave/lighthouse](https://lighthouse-php.com/))

 * [Service layer pattern](https://en.wikipedia.org/wiki/Service_layer_pattern)

 * [Repository pattern](https://bosnadev.com/2015/03/07/using-repository-pattern-in-laravel-5) (package: [prettus/l5-repository](https://github.com/andersao/l5-repository))


## Local Dev installation

### 1. Download Project

Clone the project:

```
git clone https://github.com/WGT-hq/wgtcrm-backend.git
```

And access `wgtcrm-backend` directory.

### 2. Configure your development environment

You must copy the .env.example file to a new file named .env

```
cp .env.example .env
```

### 3. Download and start the containers

[Docker-compose](https://docs.docker.com/compose/install/) must be installed.

Run the following command in your terminal:

```
docker-compose up -d
```

### 4. Access container terminal

```
docker-compose exec wgtcrm-php bash
```

### 5. Download PHP Composer dependencies

```
composer update
```
### 6. Build your database - Run migrations

```
php artisan migrate
```

6.1. Refresh the database and run all database seeds

```
php artisan migrate:refresh --seed
```

### 7. Preloading data (optional)

7.1. Executing All Seeders

```
php artisan db:seed
```

7.2. Executing Individual Seeder

```
php artisan db:seed --class=UsersSeeder
php artisan db:seed --class=ProfanitySeeder
```

### 8. Usage

Open your GraphQL client and run the following query:

```
{
    hello
}
```

The response will be:
```
{
    "data": {
        "hello": "it is working!"
    }
}
```

### Extra commands

#### Regenerate Composer's autoloader:

```
composer -o dump-autoload
```

### Library Reference

#### Roles and permissions

To allow access control to each request, we must insert the call `@middleware`, informing the necessary permission to access it.
```graphql
extend type Query @middleware(checks: ["auth"]) {
    firms: [Firm]!
        @field(resolver: "FirmQuery@all")
        @middleware(checks: ["permission:list-firms"])
```

Role and permission seeds must be fed and run with each new role/permission in the system.

By default, a `adm@worldgemtrade` user will be created with the `super-admin` role. Only he should have that role.

By default, a `dev@worldgemtrade` user will be created with the `owner-admin` role. However, that user will be created only when the seed is run outside the production environment.

By default, only the `super-admin` can create and edit roles and permissions. However, all users of the `owner-admin` role can give and revoke permissions for other users.

By default, the `owner-admin` have all permissions, except roles and permissions.

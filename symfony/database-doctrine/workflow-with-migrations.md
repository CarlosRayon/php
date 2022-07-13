# Workflow with migrations

Workflow example to work with the database with doctrine.

## Workflow before initial migration

During local development we work without migrations until we have a stable version of the database.
(We can use a composer script similar to this one):

```json
"db:reload": [
"bin/console doctrine:schema:drop --force",
"bin/console doctrine:schema:update --force",
"bin/console doctrine:fixtures:load --no-interaction"
]
```

When we have a stable database, which is supposed to require few changes, we start working with migrations.

first create the initial migration

``` bash
# Delete data for update the changes
bin/console doctrine:schema:drop --force

#Create initial migration
bin/console make:migration # this is a alias of  bin/console doctrine:migration:diff
```

With this initial migration we create a db: start command, which is that we will execute **ONCE UPON INSTALLING THE PROJECT** in our different environments:

```json
"db:start": [
    "bin/console doctrine:schema:drop --force",
    "bin/console doctrine:migrations:migrate",
    "bin/console doctrine:fixtures:load --no-interaction"
 ]
```

### Mix of schema:update and migrations

If not has a initial migrations, we can combined options. With *doctrine:migrations:sync-metadata-storage* create the table of migrations and with *bin/console doctrine:migrations:version --add --all --no-interaction* load migrations in the table but no execute him.

```json
"db:reload": [
    "bin/console doctrine:schema:drop --force",
    "bin/console doctrine:schema:update --force",
    "bin/console doctrine:migrations:sync-metadata-storage",
    "bin/console doctrine:migrations:version --add --all --no-interaction"
],
```

## Workflow after the initial migration

After the changes that we make, we make them generating migrations every time we create or modify any entity:

`bin / console doctrine: migration: diff`

And we execute with:

`bin / console doctrine: migrations: migrate`

This way we get the changes to our data model to be versioned

---

[<-- index](/symfony/database-doctrine/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)

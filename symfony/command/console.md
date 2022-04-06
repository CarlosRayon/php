# Console

Command for console

## bin/console

```cli
# Search for something specific
bin/console <intruccion> | grep <parametro busqueda>
```

## php bin/console config

```cli
# Show available bundles [show AVAILABLE configurations]
:dump [<alias>]
:dump-reference <Extension alias>

# It shows possible configurations of bundles that depend on framework (in your .yaml start with framework)
:dump-reference framework <bundle>
```

[example-command](/resources/img/command-bundle.png)

## php bin/console router

```cli
#  Validate route and give us information about it
:match <router>
```

## php bin/console debug

```cli
# List the classes / interfaces you can use for automatic wiring
:autowiring [-all]

# Show bundles [CURRENT configurations]
:config [<alias>]
```

[example-command](/resources/img/command-debug.png)

```cli
# Shows the current services of an application (most important and modifiable) [all services | parameters | environment variables].
:container [--show-private | --parameters | --env-vars]

# Shows the listeners configured for an application.
:event-dispatcher

# Shows the routes [info specific route] [narrow search]
:router [ruta] [ | grep <buscar>]

# Displays the current banner advertisements for an application.
:swiftmailer

# Displays a list of branch functions, filters, globals, and tests.
:twig

# Debug translations [only for domains]
:translation [ --domain[=DOMAIN] ]
```

## php bin/console doctrine:migrations

```cli
# Generate a migration by comparing your current database to your assigned information.
:diff

# Manually run a single migration version up or down. [Run or roll back a migration]
:execute  [--up | --down {codigo migracion} ]

# Generates a blank migration class.
:generate

# Run a migration to a specific version or to the latest version available.
:migrate

# View the status of a migration set.
:status

# Add and remove migration versions from the version table without executing the migration code.
:version <versiondate> <--add | --delete> [--all]
```

## php bin/console cache

```cli
:clear                     Clears the cache
:pool:clear           Clears cache pools
:pool:delete        Deletes an item from a cache pool
:pool:list              List available cache pools
:pool:prune        Prunes cache pools
:warmup             Warms up an empty cache
```

## php bin/console make

```cli
:auth
:command

# Create controller and associated view [Create controller within a subdirectory]
:controller [NameController | directory\\NameController]


:crud
:docker:database
:entity

# Crea fixtures (datos de prueba)
:fixtures

:form
# Create a class for a functional test
:functional-test

:message
:messenger-middleware
:migration
:registration-form
:reset-password
:serializer:encoder
:serializer:normalizer
:subscriber

# Create class to extend twig functionalities (create new filter for example)
:twig-extension
:unit-test

# Create user login (create entity and modify the segurity.yaml)
:user

:validator
:voter
```

## php bin/console doctrine:database

```cli
# Create database
:create

# Delete database [force delete]
:drop [--force]
```

## bin/console doctrine:query

```cli
:sql <query sql>
```

## php bin/console doctrine:schema

```cli
# Update schema [forced]
:update [--force]

# Drop schema
:drop [--full-database] [--force]

# Varifies if we have any failure in the schemas
:validate
```

## php bin/console doctrine:fixtures

```cli
# Carga fixtures [añade a las que habia]
:load [--append || --no-interaction]
```

## bin/console translation

```cli
# Display translation variables defined in all branches (only branch not defined in code)
:update --dump-messages <locale>

# Create translation file (in translations directory)
:update --output-format <yml | xlf | php>

# Update the translations file with the missing messages in the branches
:update --force <locale>
```

---
[<-- index-section](/symfony/command/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)

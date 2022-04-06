# Code Sniffer

[PHP Code Sniffer](https://github.com/squizlabs/PHP_CodeSniffer) It util to validate the PHP code based on the PSR standards.

## Use

Install:

`composer require squizlabs/php_codesniffer --dev`

It is not created a **phpcs.xml.dist** where we can configure options at a global level.

Execute */vendor/bin*:

```bash
# Search errors
./vendor/bin/phpcs

 # Fix errors
./vendor/bin/phpcbf
```

Scrip in composer

```json
"codeSniffer:show": "./vendor/bin/phpcs",
"codeSniffer:fix": "./vendor/bin/phpcbf"

```

## Use in private directory

We can install in a Tools directory and run from there:

```bash
mkdir --parents tools/phpcs
composer require --working-dir=tools/phpcs squizlabs/php_codesniffer
composer install --working-dir=tools/phpcs
```

Execute

`tools/phpcs/vendor/bin/phpcbf --standard=PSR12 <path>`

## Example of XML for Symfony

```xml
<?xml version="1.0" encoding="UTF-8"?>

<ruleset xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="vendor/squizlabs/php_codesniffer/phpcs.xsd">

    <arg name="basepath" value="."/>
    <arg name="cache" value=".phpcs-cache"/>
    <arg name="colors"/>
    <arg name="extensions" value="php"/>

    <rule ref="PSR12"/>

     <rule ref="Generic.Files.LineLength">
        <properties>
           <property name="lineLimit" value="180"/>
           <property name="absoluteLineLimit" value="0"/>
       </properties>
    </rule>

     <exclude-pattern>/src/Kernel.php</exclude-pattern>
     <exclude-pattern>/tests/bootstrap.php</exclude-pattern>
     <exclude-pattern>/public/index.php</exclude-pattern>

    <file>public/</file>
    <file>src/</file>
    <file>tests/</file>

</ruleset>

```

## Ignore elements

```php
$foo = 'This text in very large to show in editor'  // phpcs:ignore
```

---

[<-- index-section](/php/index.md)

[<-- index](/README.md)

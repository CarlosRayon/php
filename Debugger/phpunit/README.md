# [PHP UNIT](https://phpunit.de/index.html)

Cosas basicas sobre PHPUnit basadas en el curso de [DevTips](https://www.youtube.com/playlist?list=PLUzkSYTtNRnbd7PtQpQXr2w5jar-WgSi8)

## Instalación

Instalar las dependencias con:

```cli

composer install

composer dump-autoload -o

```

*`composer dump-autoload -o`  lo ejecuto para que se generen los autoload de namespace de forma correcta.*

## [Autoload con psr-4](https://getcomposer.org/doc/04-schema.md#psr-4)

Usamos psr-4 para el autoload. Mas info sobre [psr-4](https://www.youtube.com/watch?v=ubVh1IHIDU0)

## Basicos sobre phpunit

Las clases tiene que acabar en Test

```directory

ClassNameTest.php

```

Las funciones tienen que empezar por test.

```php

public function testLoQueSea(){}

```

Ejecutar el test sin fichero xml de configuración:

```cli

./vendor/bin/phpunit --bootstrap vendor/autoload.php test/<clase>.php --colors

```

### [XML configuracion](https://phpunit.readthedocs.io/en/9.5/configuration.html)

Podemos crear un xml de configuracion (phpunit.xml) que nos evita tener que poner las banderas por linea de comandos. Un ejemplo sencillo que nos evita poner las bandera `--bootstrap` y `--colors`:

```xml
<phpunit
    bootstrap="vendor/autoload.php"
    colors="true"
    testdox="true"
    >
</phpunit>

```

Con este fichero configurado podemos ejecutar los test con:

```cli

./vendor/bin/phpunit test/OperationsTest.php

```

Podemos tambien ejecutar todas las clases de test que esten dentro de un directorio (importante que acaben en {ClassName}Test.php)

```cli

./vendor/bin/phpunit test/

```

Disponemos de multiples [atributos de configuracion](https://phpunit.readthedocs.io/en/9.5/configuration.html) asi como [multiples banderas CLI](https://phpunit.readthedocs.io/en/9.5/textui.html) para usar.

## [Fixtures](https://phpunit.readthedocs.io/en/9.5/fixtures.html)

Define funciones que se ejecutaran de la siguiente manera:

- `setUpBeforeClass()` -> Antes cualquier método de test
- `tearDownAfterClass()` -> Al final todos los test
- `setUp()` -> antes cada funcion de test
- `tearDown()` -> Después cada función de test

[Test Suites](https://phpunit.readthedocs.io/en/9.5/organizing-tests.html#composing-a-test-suite-using-xml-configuration)

Nos permite agrupar las pruebas unitarias. Definimos en `phpunit.xml` los test suites. Podemos definir por directorios o por uno o varios archivos en concreto:

```xml
<phpunit bootstrap="vendor/autoload.php" colors="true" defaultTestSuite="default">

    <testsuites>

        <!-- Todos los test -->
        <testsuite name="default">
            <directory>test</directory>
        </testsuite>

         <!-- Test de un directorio -->
        <testsuite name="all-operations">
            <directory>test/operations</directory>
        </testsuite>

        <!-- Test por fichero -->
        <testsuite name="operations">
            <file>test/operations/OperationsTest.php</file>
            <!-- <file>test/operations/OperationsTwoTest.php</file> -->
            <!-- <file>test/operations/OperationsThreeTest.php</file> -->
        </testsuite>

    </testsuites>
</phpunit>

```

Ejecutamos las suites de la siguiente manera:

```cli

./vendor/bin/phpunit --testsuite {nombresuite}

```

Como tenemos definida el atributo `defaultTestSuite="default"` si queremos ejecutar este suite no necesitamos usar el `--testsuite`

```cli

./vendor/bin/phpunit

```

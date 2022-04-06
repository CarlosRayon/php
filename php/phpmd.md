# PHPMD

[Git](https://github.com/phpmd/phpmd)

Validates problems in the code according to the specified parameters.

## Instalación

Usamos composer

`composer require phpmd/phpmd --dev`

Execute in *.vendor/bin/phpmd*

## Use

The basic structure is:

```bash

# Basic structure

<ejecutable> <ruta/fichero | ruta/directorio> <formato salida> <regla aplicar | ruta fichero reglas.xml> [opciones]

# Basic example

./vendor/bin/phpmd src/Controller/TestController.php html cleancode

# Example that calls File Configuration Route and sets an output file

./vendor/bin/phpmd src/Controller html phpmd.xml --reportfile phpmd/report.html
```

## [Configure XML](https://phpmd.org/documentation/creating-a-ruleset.html)

We can configure an XML with rules.We create a phpmd.xml file and an example would be the following:

```xml
<?xml version="1.0"?>
<ruleset>

  <description>Example</description>

  <!-- Rues are imported individually to allow for easy configuration -->
  <!-- Property names and values can be found here: http://phpmd.org/rules/index.html -->

  <rule ref="rulesets/codesize.xml/ExcessiveMethodLength">
    <properties>
      <property name="ignore-whitespace" value="true" />
      <property name="minimum" value="150" />
    </properties>
  </rule>

  <rule ref="rulesets/cleancode.xml" />

</ruleset>

```

---

[<-- index-section](/php/index.md)

[<-- index](/README.md)

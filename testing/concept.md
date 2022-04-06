## Pasos TDD (Test driven development)

- Elegir un requerimiento
- Escribir una prueba
- Verificar que la prueba falla
- Escribir la implementación
- Ejecutar las pruebas automatizadas.
- Eliminación de duplicación
- Actualización de la lista de requisitos

> Se comienza escribiendo una prueba para el requisito. Para ello el programador debe entender claramente las especificaciones y los requisitos de la funcionalidad que está por implementar. Este paso fuerza al programador a tomar la perspectiva de un cliente considerando el código a través de sus interfaces.

## CRAP (Change Risk Analysis and Predictions o Análisis y Predicciones sobre el Riesgo en Cambios)

> Como regla general, podemos decir que mientras mantengas el índice por debajo de 5, estarás en terreno relativamente seguro. Por encima de 5, es recomendable pensar en realizar algún tipo de refactoring sobre el método en cuestión.

## Metodologias

- Seguir misma estructura directorios que el proyecto bajo un directorio test.
- Hacer una clase de test por cada clase del proyecto principal
- Nombre de la clase sera el mismo que la clase a testear añadiendo la palabra _Test_ en camelCase
    (ejemploController.php -> ejemploControllerTest.php).
- La funciones de test empezaran por _test_ (testEjemplo()) y deben ser publicas
- Es buena practica que los datos de test que se recarguen en cada llamada global a los test.
- Podemos ejecutar todos los test de directorio test con `bin/phpunit` o especificar un directorio o un test en concreto  `bin/phpunit <ruta-directorio | ruta-fichero>`
- Disponemos de multiples opciones al ejecutar lo test que podemos ver en la [doc de phpunit](https://phpunit.readthedocs.io/en/9.5/textui.html#command-line-options)

## Tipos de test

A nivel general distinguimos estos 4 tipos de test:

### Unitarios

Validan si una unidad de código funciona de la forma esperada de forma aislada y unica.
No

### Integración

- La clase extiende de **KernelTestCase** ( a su vez esta extiende de TestCase)
- Para test sobre procesos que no intervenga el cliente (comandos por ejemplo)

### Funcionales

- La clase extiende de **WebTestCase** ( a su vez esta extiende de WebTestCase) la cual implementa logica de uso de cliente
- Para test sobre controladores por ejemplo

## Aceptación

## CRAP (Change Risk Analysis and Predictions o Análisis y Predicciones sobre el Riesgo en Cambios)

> Como regla general, podemos decir que mientras mantengas el índice por debajo de 5, estarás en terreno relativamente seguro. Por encima de 5, es recomendable pensar en realizar algún tipo de refactoring sobre el método en cuestión.

## Metodologias

- Seguir misma estructura directorios que el proyecto bajo un directorio test.
- Hacer una clase de test por cada clase del proyecto principal
- Nombre de la clase sera el mismo que la clase a testear añadiendo la palabra _Test_ en camelCase
    (ejemploController.php -> ejemploControllerTest.php).
- La funciones de test empezaran por _test_ (testEjemplo()) y deben ser publicas
- Es buena practica que los datos de test que se recarguen en cada llamada global a los test.
- Podemos ejecutar todos los test de directorio test con `bin/phpunit` o especificar un directorio o un test en concreto  `bin/phpunit <ruta-directorio | ruta-fichero>`
- Disponemos de multiples opciones al ejecutar lo test que podemos ver en la [doc de phpunit](https://phpunit.readthedocs.io/en/9.5/textui.html#command-line-options)

## Metodos del ciclo de vida

En las clases de test aparte de los metodos que creemos nosotros, podemos declarar funciones para que se ejecuten [antes y despues del test](https://phpunit.readthedocs.io/en/9.5/fixtures.html).

Principalmente son dos **(importante definir el :void)**:

- protected function setUp():void
  - Se ejecutan una vez para cada método de prueba (y en instancias nuevas) de la clase de caso de prueba.

- protected function tearDown():void
  - Se ejecutan una vez para cada método de prueba (y en instancias nuevas) de la clase de caso de prueba.

## FUENTES

<https://medium.com/@emilianozublena/unit-testing-con-phpunit-parte-3-bb108c41292a>

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)

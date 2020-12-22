<?php

declare(strict_types=1);

use Src\Ope\Operations;
use PHPUnit\Framework\TestCase;

class OperationsTest extends TestCase
{

    private $_expected = [
        2 => 2,
        3 => 6,
        4 => 24,
        5 => 120
    ];

    protected static $db;

    /**
     * setUpBeforeClass Se ejecuta antes de ejecutar cualquier método de la clase
     *
     * @return void
     */
    public static function setUpBeforeClass(): void
    {
        /* Puedo crear conexión base datos aqui y destruir en tearDownAfterClass por ejemplo */
        self::$db = "Conexión a la base de datos...";
    }

    /**
     * tearDownAfterClass Se ejecuta al final de todas las pruebas
     *
     * @return void
     */
    public static function tearDownAfterClass(): void
    {
        echo PHP_EOL;
        /* Limpio conexion */
        self::$db = "Desconectada de la base de datos";
        echo self::$db;
    }

    /**
     * setUp  Se ejecuta siempre antes de cada prueba
     *
     * @return void
     */
    protected function setUp(): void
    {
        echo PHP_EOL;
        echo 'setUp';

        /* Puedo definir un atributo y llamar a posterior */
        $this->atributoSetUp = 'Atributo definido en setUp()';
    }

    /**
     * tearDown Se ejecuta siempre después de cada prueba
     *
     * @return void
     */
    protected function tearDown(): void
    {
        echo PHP_EOL;
        echo 'tearDown';
    }

    /**
     * testFactorialNumber Test que valida que un numero sea factorial de otro
     *
     * @return void
     */
    public function testFactorialNumber(): void
    {
        echo PHP_EOL;

        echo $this->atributoSetUp;

        $operation = new Operations();

        foreach ($this->_expected as $number => $expected) {
            $factorial = $operation->factorial($number);

            /* I can use echo in the test */
            // echo PHP_EOL;
            // echo ($factorial);

            $this->assertIsInt($factorial, 'Factorial no es entero');
            $this->assertEquals($expected, $factorial, "El factorial de {$number} debe ser {$expected} y no {$factorial}");
        }
    }

    /**
     * testDb Test para probar que en el método setUpBeforeClass() puede definir parámetros
     *
     * @return void
     */
    public function testDb(): void
    {
        echo PHP_EOL;
        echo self::$db;

        $this->assertTrue(true);
    }
}

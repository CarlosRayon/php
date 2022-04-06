<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

// error_reporting(E_ALL);

class MyFirstTest extends TestCase
{


    public function testAssertTrueOK(): void
    {
        $this->assertTrue(true, "SI paso la validación la función de test testAssertTrueOK");
    }

    public function testAssertTrueKO(): void
    {
        $this->assertTrue(false, "NO paso la validación la función de test testAssertTrueKO");
    }

    public function testIsArray(): void
    {
        $array = [1, 2, 3];
        $this->assertIsArray($array);

        $this->assertIsArray(null, 'NO es array'); /* ko*/
    }

    public function testIsString(): void
    {
        $this->assertIsString('Hello world');
    }

    public function testStringStartWith()
    {

        $this->assertStringStartsWith('Ca', 'Carlos', 'No paso la validación'); /* case sensitive */
    }

    public function testArrayHasKey(): void
    {
        $array = [
            'name' => 'Carlos',
            'surname' => 'Rayon'
        ];

        $this->assertArrayHasKey('surname', $array, 'No esta la key'); /* case sensitive */
    }
}

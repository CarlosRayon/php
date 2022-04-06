# Command and testing

Is important that the functions that the command execute must have the annotation:

`/** @test */`

```php
/** @test */
public function executeTest(){
// . . .
}
```

To execute a command from the tests:

```php
// . . . Class extend KernelTestCase or WebTestCase

/* Some options */
// $kernel = self::bootKernel();
// $kernel = self::bootKernel(['environment' => 'dev']);

$kernel = static::createKernel();
$application = new Application($kernel);
$command = $application->find('name:command');
$commandTester = new CommandTester($command);
$commandTester->execute([]);


/* We can validate the test by verifying the message of return among other methods */

$output = $commandTester->getDisplay();
$this->assertStringContainsString('Somethings text', $output);

```

[Doc](https://symfony.com/doc/3.1/console.html#testing-commands)

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)

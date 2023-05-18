# Use services in test

To use services within our test classes:

## Extends TestCase

In this case, we must make **KernelTestCase** extend to use the services

## Extends KernelTestCase

I can create it in the SetUp() function or in the function itself that the test does

```php

class FooTest extends KernelTestCase
{
    private $fooService;

    public function setUp(): void
    {
        /* Private service */
        self::bootKernel();
        $container = static::getContainer();
        $this->fooService = $container->get(FooService::class);
    }

    public function testFoo(){
        $kernel = self::bootKernel();
        $entityManager = $kernel->getContainer()->get('doctrine.orm.entity_manager');
        // $this->entityManager = $kernel->getContainer()->get('doctrine')->getManager();

        /* other service */
        $profiler = $kernel->getContainer()->get('profiler');

        /* more service */
        $container = $kernel->getContainer();
        $foo = $container->getParameter('foo_foo');
    }
}

```

## Extends WebTestCase

We can use the previous method or the client.

```php

class FooTest extends WebTestCase
{
    $client = static::createClient();
    $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');
}

```

## Tips

We can use a support function to use services

```php

// . . .

class FooTest extends KernelTestCase
{

   public function getService(string $service)
   {
       return self::bootKernel()->getContainer()->get($service);
   }

    /* Example */
    public function testEntityCreate()
    {
        // . . .
        $entityManager = $this->getService('doctrine.orm.entity_manager');

    }
}

```

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)

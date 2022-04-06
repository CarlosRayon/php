# Use services in test

To use services within our test classes:

## Extends TestCase

In this case, we must make **KernelTestCase** extend to use the services

## Extends KernelTestCase

I can create it in the SetUp() function or in the function itself that the test does

```php

class FooTest extends KernelTestCase
{
    $kernel = self::bootKernel();

    /* Entity manager service */

    // $this->entityManager = $kernel->getContainer()->get('doctrine')->getManager();
    $entityManager = $kernel->getContainer()->get('doctrine.orm.entity_manager');

    /* Profiler service */

    $profiler = $kernel->getContainer()->get('profiler');

}

```

## Extends WebTestCase

We can use the previous method or the client.

```php

class FooTest extends WebTestCase
{
    $client = static::createClient();

    /* Entity manager service */
    $entityManager = $client->getContainer()->get('doctrine.orm.entity_manager');

    /* Profiler service */
    $profiler= $client->getContainer()->get('profiler');
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


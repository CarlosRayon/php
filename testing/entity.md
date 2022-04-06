# Entity

- For an entity we must validate that it can be created and the set and getter methods.
- If we have a contractory validate that can be created with the constructor.

```php

<?php

namespace App\Tests\Entity;

use DateTime;
use App\Entity\Example;
use PHPUnit\Framework\TestCase;

class ExampleTest extends TestCase
{

    /* string */
    private $strings = 'String test';

    /* roles/Array */
    private $roles =  ['ROLE_ADMIN'];

    /* collections */
    private $testCollectionOne;
    private $testCollectionTwo;


    public function testExampleCreate()
    {
        /* - - - - - -  CREATE OBJECT - - - - - - -  */

        /* object */
        $Example = new Example();

        /* string */
        $Example->setString($this->strings);

        /* dateTime */
        $Example->setDate(new DateTime()); /* DateTimeInterface */

        /* boolean */
        $Example->setActive();

        /* roles/Array */
        $Example->setRoles($this->roles);

        /* collections */
        $this->collectionElementOne = new TestCollective();
        $this->collectionElementTwo = new TestCollective();
        $Example->addCollective($this->testCollectionOne);
        $Example->addCollective($this->testCollectionTwo);


        /* - - - - - - - -  ASSERT  - - - - - - - -   */

        /* object */
        $this->assertInstanceOf(Example::class, $Example);
        $this->assertNull($Example->getId());

        /* string */
        $this->assertSame($this->name, $Example->getName());

        /* dateTime */
        $this->assertInstanceOf(DateTimeInterface::class, $Example->getDate());

        /* boolean */
        $this->assertTrue($Example->getActive());

        /* roles/Array */
        $this->assertSame($this->roles, $Example->getRoles());

        /* collections */
        $objectCollectionElement = $Example->getCollectives();
        $this->assertInstanceOf(Collective::class, $objectCollectionElement[0]);
        $this->assertTrue($objectCollectionElement->contains($this->collectionElementOne));
        $this->assertInstanceOf(Collective::class, $objectCollectionElement[1]);
        $this->assertTrue($objectCollectionElement->contains($this->collectionElementTwo));

        /* - - - - - - OTHER ASSERT - - - - - - */
    }
}
```

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)

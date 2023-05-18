# Exceptions

```php
class FooTest extends KernelTestCase{
    public function testException(){
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Some text');

        /* Process that throw some exception */
        throw new Exception('Some text');

        /* The test no continue. Test exception last time */
    }
}

```

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)

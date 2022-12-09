# PhpUnit Config

Execute test order.

```xml
<!-- phpunit.xml -->

<testsuites>
    <testsuite name="Entities">
        <directory>tests/Entity</directory>
    </testsuite>
    <testsuite name="Command">
        <file>tests/Command/FooCommandTest.php</file>
        <file>tests/Command/FooTwoCommandTest.php</file>
    </testsuite>
    <testsuite name="Controllers">
        <directory>tests/Controller</directory>
    </testsuite>
    <testsuite name="Services">
        <directory>tests/Service</directory>
    </testsuite>
</testsuites>
```

Remove Deprecations alerts

```xml
    <php>
        <!-- Other params -->
        <env name="SYMFONY_DEPRECATIONS_HELPER" value="weak" />
    </php>
```

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)


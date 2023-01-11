# Custom Validation Constraint

-   Test the validator

```php

use App\Validator\Foo;
use App\Validator\FooValidator;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

class UserValidatorTest extends ConstraintValidatorTestCase
{
    protected function createValidator()
    {
        return new FooValidator();
    }

    /* Test not violation */
    public function testNullIsValid()
    {
        $this->validator->validate(null, new Foo());

        $this->assertNoViolation();
    }

    /* Test violation */
    public function testUserProviderWithGroup()
    {
        $this->validator->validate($userEntity, new Foo());

        /* Create a violation equals that FooValidator */
        $this->buildViolation('{{ value }}')
            ->setParameter('{{ value }}', 'Test of violation')
            ->atPath('property.path.userGroup') /* 🧐 Is FooValidator has atPath() */
            ->assertRaised();
    }
}

```

## Resources

[doc](https://symfony.com/doc/current/validation/custom_constraint.html#testing-custom-constraints)

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)

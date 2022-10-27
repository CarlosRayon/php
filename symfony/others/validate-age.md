# Validate Age

Constraint to validate that the user is greater than a defined age.

## Files

```php
// src/Validator/

<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class MaxAge extends Constraint
{
    public $message = 'User no allowed';
    public $minAge = null;
}

```

```php

// src/Validator/

<?php

namespace App\Validator;

use DateTime;
use DateInterval;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;

class MaxAgeValidator extends ConstraintValidator
{

    public const MINAGE = '18';

    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\MaxAge */

        if (!$constraint instanceof MaxAge) {
            throw new UnexpectedTypeException($constraint, MaxAge::class);
        }

        if (null === $value || '' === $value) {
            return;
        }

        if (!$this->validateMinAge($value, $constraint->minAge)) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ value }}', $value->format('Y'))
                ->addViolation();
        }
    }

    private function validateMinAge($value, $minAge)
    {
        $minAge = is_null($minAge) ? self::MINAGE : $minAge;

        $currentDate = new DateTime();
        $currentDate->sub(new DateInterval("P{$minAge}Y"));

        if ($value > $currentDate) {
            return false;
        }

        return true;
    }
}

```

## Use

### Into form

```php

// . . .

use App\Validator\MaxAge;

// . . .

public $translator;

public function __construct(TranslatorInterface $translator)
{
    $this->translator = $translator;
}

// . . .

->add('birthdate', BirthdayType::class, [
                'label' => 'security.register.error.birthdate',
                'widget' => 'single_text',
                'constraints' => [
                        new MaxAge(['message' => $this->translator->trans('security.register.error.birthdate', [], "security") ]) /*Le pasamos la traducción para el mensaje error.*/
                ],

// . . .

```

### En una entidad

By default translation the *translations/validators.en.yml*

```php

// . . .

use App\Validator\Constraints as AppAsserts;

// . . .

 /**
 * @ORM\Column(type="date", options={"default":"1990-01-01"})
 * @Assert\NotBlank
 * @AppAsserts\MaxAge(message="user.error.birthdate")
 */
    private $birthdate;

```

---

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)

# Created_at and updated_at

How do created_at and updated_at fields

We create a trait like this:

```php
<?php

namespace App\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;
use DateTime;

/**
 * @codeCoverageIgnore
 */
trait TimestampableTrait
{
    /**
     * @ORM\Column(name="created_at", type="datetime")
     */
    protected $createdAt;

    /**
     * @ORM\Column(name="updated_at", type="datetime")
     */
    protected $updatedAt;

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * @param mixed $createdAt
     * @return self
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param mixed $updatedAt
     * @return self
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function updatedTimestamps()
    {
        $dateTimeNow = new DateTime('now');
        $this->setUpdatedAt($dateTimeNow);
        if ($this->getCreatedAt() === null) {
            $this->setCreatedAt($dateTimeNow);
        }
    }
}

```

We include in the class we want to use and active in the class the *HasLifecycleCallbacks*

```php

// . . .

/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 * @ORM\HasLifecycleCallbacks()
 */
class Test
{
    use TimestampableTrait;

// . . .
```

---

[<-- index](/symfony/database-doctrine/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)

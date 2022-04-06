# Get users by roles

Get users by roles

```php

//... UserRepository.php

   public function findByRole($role)
    {
        return $this->_em->createQueryBuilder()
            ->select('u')
            ->from($this->_entityName, 'u')
            ->where('u.roles LIKE :roles')
            ->setParameter('roles', '%"' . $role . '"%')
            ->getQuery()
            ->getResult();
    }
```

---

[<-- index](/symfony/database-doctrine/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)

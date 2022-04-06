# Simulate Login

## Minor versions of 5.4

To simulate the autentican by form, we create a `Config/Packages Test/Security.yaml` with the following configuration:

```yaml
# config/packages/test/security.yaml
security:
    firewalls:
        # replace 'main' by the name of your own firewall
        main:
            http_basic: ~
```

Then we have two options to establish user login:

- Creating customer with data access

```php
$client = static::createClient([], [
    'PHP_AUTH_USER' => 'username',
    'PHP_AUTH_PW'   => 'pa$$word',
]);
```

- Passing the data in the request:

```php
$client->request('GET', '/foo/1', [], [], [
    'PHP_AUTH_USER' => 'username',
    'PHP_AUTH_PW'   => 'pa$$word',
]);
```

[doc](https://symfony.com/doc/4.4/testing/http_authentication.html)

---

## Versiones 5.4^

The method is introduced [loginUser()](https://symfony.com/doc/5.4/testing.html#testing_logging_in_users)

```php

// tests/Controller/ProfileControllerTest.php
namespace App\Tests\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ProfileControllerTest extends WebTestCase
{
    // ...

    public function testVisitingWhileLoggedIn()
    {
        $client = static::createClient();
        $userRepository = static::getContainer()->get(UserRepository::class);

        // retrieve the test user
        $testUser = $userRepository->findOneByEmail('john.doe@example.com');

        // simulate $testUser being logged in
        $client->loginUser($testUser);

        // test e.g. the profile page
        $client->request('GET', '/profile');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Hello John!');
    }
}
```

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)


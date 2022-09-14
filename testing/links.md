# Links

## Select and click links

Click directly

```php
$client = static::createClient();
$client->request('GET', '/post/hello-world');

$client->clickLink('Click here');
```

If you need access to the Link object that provides helpful methods specific to links

```php
$client = static::createClient();
$crawler = $client->request('GET', '/post/hello-world');

$link = $crawler->selectLink('Click here')->link();
// ...

/* use click() if you want to click the selected link */
$client->click($link);
```

## Check Link

```php

$client = static::createClient();
$crawler = $client->request('GET', '/post/hello-world');

$link = $crawler->selectLink('Click here')->link();

/* Check uri and method */
$this->stringContains('/foo/foo', $link->getUri());
$this->assertSame('GET', $link->getMethod());

/* click and validate route link */
$client->click($link);
/* route name of /foo/foo */
$this->assertRouteSame('route_name');

```

## Follow link

`$client->clickLink('Click here');` or `$client->click($link);` return a crawler

```php
$client = static::createClient();
$client->request('GET', '/post/hello-world');

$crawler = $client->clickLink('Click here');

/* Client now is new request */
```

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)


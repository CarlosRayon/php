# Forms

## Submit form

```php

$client = static::createClient();
$crawler = $client->request('GET', '/post/hello-world');

/* Select form */
$form = $crawler->filter('<css selector>')->form();

/* Set Values (for select type is equals)*/
$fomr['<name value>]'->setValue('Foo');

/* Check checkbox */
$form['<name value>']->tick();

/* Submit */
$client->submit($form);


$this->assertResponseRedirects('<path>');

$crawler = $client->followRedirect();
```

## [Submit form directly](https://symfony.com/doc/5.4/testing.html#submitting-forms)

```php
$client->submitForm('Submit button value', [
    'user' => 'user',
    'password' => 'password,
]);
```

## Check redirection

```php

// . . .

$client->submit($form);

/* For complete path  */
$this->assertResponseRedirects('<path>');

/* For partial path (example when send random parameters)*/
$this->assertContains('/es/redsys/pay', $client->getResponse()->getTargetUrl());
```

## Add data to collection input form

```php

    /*  > Go to section */
    $crawler = $client->request('GET', 'http://localhost/service/1/edit');
    $this->assertResponseIsSuccessful();

    /*  > Get form */
    $form = $crawler->filter('form[name=form-name]')->form();

    /*  > Add new data to form */
    $values = array_merge_recursive(
        $form->getPhpValues(),
        [
            'service' => [
                'collection-name' => [
                    [
                        'field-1' => 'lorem ipsum',
                        'field-2' => '1',
                    ],
                    [
                        'field-1' => 'lorem ipsum ',
                        'field-2' => '1',
                    ]
                ]
            ]
        ]
    );

    /*  > Send data */
    $crawler = $client->request($form->getMethod(), $form->getUri(), $values);
```

## Simulate submit request

It is important to send the **\_token** and **follow the data structure of the form ( form[fields][fields] )**.
Symfony validates this in the $form->handleRequest($request);

```php

// . . .

$form =  $crawlerEdit->filter('<css selector>')->form();

$values = [
    'foo' => [
        'foo_a' => $form['foo']['a']->getValue(),
        'foo_b' => $form['foo']['b']->getValue(),
        '_token' => $form['_token']->getValue()
    ]
];

$client->request('POST', '/path', $values);

```

## Unset some field pre submit form

```php

$form =  $crawlerEdit->filter('form')->form();

unset($form['foo']);

$client->submit($form);

```

### Validate form info

```php
$form = $crawler->selectButton('Submit button value')->form();
$this->assertArrayHasKey('user_name[foo]', $form->getValues());
$this->assertArrayHasKey('user_password[foo]', $form->getValues());
$this->assertSame('POST', $form->getMethod());
```

## Resources

[doc](https://symfony.com/doc/current/components/dom_crawler.html#forms)

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)

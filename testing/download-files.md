# Download Files

For example for download pdf

```php
// . . .

$client = static::createClient([], [
'PHP_AUTH_USER' => 'user@domain.com',
'PHP_AUTH_PW' => 'pass',
]);

/* Get */
$crawler = $client->request('GET', 'path/download/pdf/1');

$this->assertResponseIsSuccessful();
$this->assertResponseHeaderSame('content-type', 'application/pdf');
$this->assertResponseHeaderSame('content-disposition', "attachment; filename=innvoice-name.pdf");

```

[<-- index-section](/testing/index.md)

[<-- index](/README.md)

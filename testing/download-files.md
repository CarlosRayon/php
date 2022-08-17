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

/* The $client has header that we can validate */
$this->assertResponseHeaderSame('content-type', 'application/pdf');
$this->assertResponseHeaderSame('content-disposition', "attachment; filename=innvoice-name.pdf");u

/* If want other header info for example if the downloaded file has a dynamic name */
$headerContentDisposition = $client->getResponse()->headers->get('content-disposition');
$this->assertStringContainsString('filename=invoice-name-', $headerContentDisposition); /* The name has date */
$this->assertStringContainsString('.pdf', $headerContentDisposition);

/* If save file before download, validate that the process is correct */
$pathFile = $client->getResponse()->getFile()->getPathname();

$filesystem = new Filesystem();
$this->assertTrue($filesystem->exists($pathFile));

```

## Resources

[doc](https://symfony.com/doc/current/components/dom_crawler.html#forms)

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)

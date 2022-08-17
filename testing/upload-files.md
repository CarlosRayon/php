# Upload Files

For example for upload pdf

```php
// . . .

$client = static::createClient([], [
'PHP_AUTH_USER' => 'user@domain.com',
'PHP_AUTH_PW' => 'pass',
]);

$crawler = $client->request('GET', 'path/import');

$pathTestFile = sprintf('%s/%s', $this->getContainer()->getParameter('kernel.project_dir'), 'path/file');

/** @var Form $form */
$form = $crawler->selectButton('Import')->form();
$form["import_file[file]"]->upload("$pathTestFile/file-test.pdf");
$crawler = $client->submit($form);

/* We can validate if the form throw error */
$this->assertSelectorTextContains(
    ".error",
    'Type mime no validad for example'
);

$redirectPath = $client->getResponse()->getTargetUrl();
$this->assertStringContainsString('/path/preview/', $redirectPath);
$client->followRedirect();

 /* validate crawler or other elements */
// . . .

```

## Resources

[doc](https://symfony.com/doc/current/components/dom_crawler.html#forms)

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)

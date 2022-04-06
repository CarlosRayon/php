# Login

```php
   public function testLogin()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/foo/login');

        /* Exist url */
        $this->assertResponseIsSuccessful('Response IS NOT SUCCESSFUL');
        $this->assertResponseStatusCodeSame('200', 'Response code IS NOT 200');

        /* Validate exist the element */
        $this->assertSelectorExists('#inputEmail', 'selector #inputEmail NOT EXIST');
        $this->assertSelectorExists('#inputPassword', 'selector #inputPassword NOT EXIST');

        /* Validate the form send and the redirect */
        $form = $crawler->selectButton('submit')->form();
        $form['email'] = 'email0@example.com';
        $form['password'] = 'secret0';
        $crawler = $client->submit($form);

        /* Validate the redirect url (option 1)  */
        $this->assertResponseRedirects('/foo/foo', null, 'Redirect response IS NOT SUCCESSFUL');

        /* Save the new page */
        $crawler = $client->followRedirect();
        /* Validate the redirect url (option 2) */
        $this->assertStringContainsString('/foo/foo', $crawler->getUri(), 'Redirect url IS NOT CORRECT');
    }
```

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)


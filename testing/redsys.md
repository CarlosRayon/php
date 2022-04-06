# Redsys

```php

<?php

namespace App\Tests\Controller\Redsys;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class redsysTest extends WebTestCase
{
    public function testRedsys()
    {
        $client = static::createClient();
        $crawler = $client->request(
            'POST',
            'url/data/',
            [
                'Ds_MerchantParameters' => 'eyJEc19EYXRlIjoiMjglMkYwOCUyRjIwMjAiLCJEc19Ib3VyIjoiMTIlM0ExMyIsIkRzX1NlY3VyZVBheW1lbnQiOiIwIiwiRHNfQW1vdW50IjoiNDgwMCIsIkRzX0N1cnJlbmN5IjoiOTc4IiwiRHNfT3JkZXIiOiIxNTk4NjA5NjAwNTUiLCJEc19NZXJjaGFudENvZGUiOiIwNjYxNDM5NzUiLCJEc19UZXJtaW5hbCI6IjAwMSIsIkRzX1Jlc3BvbnNlIjoiMDAwMCIsIkRzX1RyYW5zYWN0aW9uVHlwZSI6IjAiLCJEc19NZXJjaGFudERhdGEiOiJDdXN0b21lck9yZGVyIiwiRHNfQXV0aG9yaXNhdGlvbkNvZGUiOiIwODkyOTYiLCJEc19FeHBpcnlEYXRlIjoiMjAxMiIsIkRzX01lcmNoYW50X0lkZW50aWZpZXIiOiJhMjBjYTcyZGQ3YTlmZjlkZWNiM2I5ZDBhODM2OTA0NWU1NDNiMzBmIiwiRHNfQ29uc3VtZXJMYW5ndWFnZSI6IjEiLCJEc19DYXJkX0NvdW50cnkiOiI3MjQiLCJEc19DYXJkX0JyYW5kIjoiMSIsIkRzX1Byb2Nlc3NlZFBheU1ldGhvZCI6IjE0In0=',
                'Ds_SignatureVersion' => 'HMAC_SHA256_V1',
                'Ds_Signature' => 'G0c31CfDu9mVSToE8jPl5m7wc8yisXI8Hh0Ebi06coA='
            ]
        );

        $this->assertResponseIsSuccessful();
    }

}

```

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)


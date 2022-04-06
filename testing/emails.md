# Emails

[Active profiler](https://symfony.com/doc/current/testing/profiling.html)

## Get emails in functional test

```php

/* Get emails */
$mailCollector = $client->getProfile()->getCollector('mailer');
$emails = $mailCollector->getEvents()->getMessages();
$email = $emails[0];

/*  Symfony 4.4^ */
$email = $this->getMailerMessage(0);

```

## Get emails in command test

```php

/*  Symfony 4.4^ */
$email = $this->getMailerMessage(0);

```

## Account emails sent

```php

$this->assertSome(1, count($emails));

/* Symfony 4.4^ */
$this->assertEmailCount(1);

```

## Types and Template

```php

/* Type */
$this->assertInstanceOf('Symfony\Bridge\Twig\Mime\TemplatedEmail', $email);

/* Template */
$this->assertSame($email->getHtmlTemplate(), "emails/foo_template.html.twig");
```

## Test header

```php

$this->assertSame("Asunto del email", $email->getSubject());

/* Symfony 4.4^ */
$this->assertEmailHeaderSame($email, 'To', 'foo@email.com');
$this->assertEmailHeaderSame($email, 'Subject', "Asunto");
$this->assertEmailHeaderSame($email, 'From', "foo@email.com");

```

## Test content

```php

 $this->assertEmailHtmlBodyContains($email, 'Lorem ipsum');

/* or . . . */
$this->assertEmailTextBodyContains($email, 'lorem ipsum');


/* For something more specific we create a crawler */
$emailBody = $email->getHtmlBody();
$emailCrawler = new Crawler($emailBody);

$this->assertContains('Element text', $emailCrawler->filter('p')->eq(0)->text());
$link = $emailCrawler->selectLink('Link test')->link()->getUri();
$this->assertContains(
    "/foo/foo",
    $link
);
```

## Attachments

```php
// . . .

$email = $this->getMailerMessage(0);


/* Account attachments */
$this->assertEmailAttachmentCount($email, 1);

$attachments = $email->getAttachments();

$media = $attach[0]->getMediaType();
```

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)

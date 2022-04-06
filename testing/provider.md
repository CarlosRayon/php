# Provider

We can have a function that provides data to our test functions.

- We define a function that returns a data array.
- Each array position are data that we will obtain in our function by parameters.
- For each position the function will be executed from which we recover the data
- To use the Provider in a function we invoke you through Annotations

## Only one position with data. The TestSomethink function runs once

```php

     /**
     * @dataProvider getTwoData
     */
    public function testSomeThink($dataOne, $dataTwo
    ) {
        //....
    }

    public function getTwoData()
    {
        return [
            [
                'dato-one',
                'dato-two'
            ]
        ];
    }
```

## Several positions with data.The testSomethink function is executed as many times as getMultidata array positions

```php
/**
     * @dataProvider getMultiData
     */
    public function testSomeThink(
        $dataOne,
        $dataTwo
    ) {
        //....
    }

    public function getMultiData()
    {
        return [
            [
                'dato-one',
                'dato-two'
            ],
            [
                'dato-one',
                'dato-two'
            ],
            [
                'dato-one',
                'dato-two'
            ],
        ];
    }
```

## Example

```php
 /**
     * @dataProvider provideUrls
     */
    public function testHomepage(
        $url
    )
    {
        $client = static::createClient();
        $crawler = $client->request('GET', $url);

        $this->assertResponseIsSuccessful();
    }

    public function provideUrls()
    {
        return [
            ['/'],
            ['/es/page-1'],
            ['/es/page-2'],
            ['/es/page-3'],
            ['/es/page-4'],
        ];
    }
```

---

[<-- index-section](/testing/index.md)

[<-- index](/README.md)


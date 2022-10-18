# variables between functions

If we want to pass a value between functions of the same class.

```php
public function testOne(){
    // . . .

    $GLOBALS['foo'] = 'foo';
}

public function testTwo(){

    // . . .
    $foo = $GLOBALS['foo'];

    /* clean */
    unset($GLOBALS['foo']);
}
```

# Dinamic cache name con git data

```php
public function getCacheName(){
    $path = $kernel->getProjectDir() . '/.git/';
    $head = trim(substr(file_get_contents($path . 'HEAD'), 4));
    $headString = explode('/', $head);
    $headString = end($headString);
    $hash = trim(file_get_contents(sprintf($path . $head)));
    return = sprintf('v%s-%s', $hash, $headString);
}
```

---

[<-- index](/symfony/front/index.md)

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)


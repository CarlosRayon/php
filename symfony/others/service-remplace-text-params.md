# Service to remplace text

Service that has passed a text and an entity, generate an array of replacement parameters dynamically, search the text and replace

## Service

```php

namespace App\Service;

use App\Entity\Foo;
use Symfony\Component\String\ByteString;

class TextParameterTransformer
{
    public const PARAM_START = '{{';
    public const PARAM_END = '}}';
    public const PARAM_MATCH_REX = "/[{{]{2}\S\w.+\S[}}]{2}/";

    /* Params: <prop>[.prop] */
    public const PARAM_CUSTOMER_NAME = 'customer.name';
    public const PARAM_CUSTOMER_UUID = 'customer.uuid';
    public const PARAM_QUANTITY = 'quantity';
    public const PARAM_ZIP_CODE = 'zipcode';
    public const PARAM_KM_AMMOUNT = 'km_ammount';

    public const PARAMS = [
        self::PARAM_CUSTOMER_NAME,
        self::PARAM_CUSTOMER_UUID,
        self::PARAM_QUANTITY,
        self::PARAM_ZIP_CODE,
        self::PARAM_KM_AMMOUNT,
    ];

    /**
     * @param string $text
     * @param mixed $dataProvider
     * @return string
     */
    public function parameterTransformer(string $text, $dataProvider): string
    {
        if (!preg_match(self::PARAM_MATCH_REX, $text)) {
            return $text;
        }

        $params = $this->paramsGenerator($dataProvider);

        return $this->replaceParamsToParamValue($params, $text);
    }

    /**
     * @param string $index
     * @return string
     */
    private function buildKey(string $key): string
    {
        return self::PARAM_START . $key . self::PARAM_END;
    }

    /**
     * Generate params (params => value) to remplace in text
     * @param Foo $dataProvider
     * @return array
     */
    private function paramsGenerator($dataProvider): array
    {
        $remplaceParams = [];
        foreach (self::PARAMS as $param) {
            $paramsToGetter = explode('.', $param);
            $getters = [];

            foreach ($paramsToGetter as $paramToGetter) {
                $getter = 'get' . (new ByteString($paramToGetter))->camel()->title();
                $getters[] = $getter;
            }

            $provider = $dataProvider;
            $result = null;

            foreach ($getters as $getter) {
                if (method_exists($provider, $getter)) {
                    $result = $provider->$getter();
                    $provider = $result;
                }
            }

            $remplaceParams[$param] = $result ? $result : '';
        }

        return $remplaceParams;
    }

    /**
     * @param array $params
     * @param string $text
     * @return string
     */
    private function replaceParamsToParamValue(array $params, string $text): string
    {
        foreach ($params as $param => $value) {
            $keyToSearch = $this->buildKey($param);
            if (false !== strpos($text, $keyToSearch)) {
                $text = str_replace($keyToSearch, $value, $text);
            }
        }

        return $text;
    }
}

```

---

[<-- index/symfony](/symfony/index.md)

[<-- index](/README.md)

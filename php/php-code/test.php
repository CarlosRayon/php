<?php

/**
 * unique_multidim_array Devuelve el array pasado por parametro con valores unicos
 *
 * @param  array  $array
 * @param  string $key
 * @return array array sin campos duplicados
 */
function unique_multidim_array($array, $key)
{
    $temp_array = array();
    $i = 0;
    $key_array = array();

    foreach ($array as $val) {
        if (!in_array($val[$key], $key_array)) {
            $key_array[$i] = $val[$key];
            $temp_array[$i] = $val;
        } else { /* OPCIONAL PARA ESTE EJEMPLO Si ya esta esta guardado aumentamos el stock del mismo */
            foreach ($temp_array as $i => $item) {
                if (in_array($val[$key], $item)) {
                    $temp_array[$i]['orderItem_Quantity']++;
                }
            }
        }
        $i++;
    }
    return $temp_array;
}

/**
 * unique_line_product_worten Devuelve el array procesado y en formato correcto
 *
 * @param  array $orderItem
 * @return array Mismo array de entrada pero con las lineas de productos agrupadas
 */
function unique_line_product_worten($orderItem)
{

    $totalOrders = count($orderItem);
    /* Convierto las posicones en arrays para poder usar la funcion unique_multidim_array() */
    for ($i = 0; $i < $totalOrders; $i++) {
        $orderItem[$i] = (array) $orderItem[$i];
    }

    /* Obtengo array con linea no repetidas mismo producto */
    $orderItem = unique_multidim_array($orderItem, 'orderItem_MerchantProductId');

    /* ordeno array */
    $orderItem = array_values($orderItem);

    $aux = count($orderItem);
    /* Vuelvo a dejar como array de objectos */
    for ($i = 0; $i < $aux; $i++) {
        $orderItem[$i] = (object) $orderItem[$i];
    }

    return $orderItem;
}

$a = array(

    (object) array(
        'beezUPOrderItemId' => 1,
        'orderItem_MerchantImportedProductIdColumnName' => 'id',
        'orderItem_MerchantProductIdColumnName' => 'id',
        'orderItem_BeezUPStoreId' => 'd1478a61-8514-494f-aeae-fa0cc716ac78',
        'orderItem_MerchantProductId' => 80024881,
        'orderItem_ItemPrice' => 119,
        'orderItem_Quantity' => 1,
        'orderItem_TotalPrice' => 119,
        'orderItem_Shipping_Price' => 1.65,
    ),
    (object) array(
        'beezUPOrderItemId' => 2,
        'orderItem_MerchantImportedProductIdColumnName' => 'id',
        'orderItem_MerchantProductIdColumnName' => 'id',
        'orderItem_BeezUPStoreId' => 'd1478a61-8514-494f-aeae-fa0cc716ac78',
        'orderItem_MerchantProductId' => 80024885,
        'orderItem_ItemPrice' => 119,
        'orderItem_Quantity' => 1,
        'orderItem_TotalPrice' => 119,
        'orderItem_Shipping_Price' => 1.65,
    ),
    (object) array(
        'beezUPOrderItemId' => 3,
        'orderItem_MerchantImportedProductIdColumnName' => 'id',
        'orderItem_MerchantProductIdColumnName' => 'id',
        'orderItem_BeezUPStoreId' => 'd1478a61-8514-494f-aeae-fa0cc716ac78',
        'orderItem_MerchantProductId' => 80024880,
        'orderItem_ItemPrice' => 119,
        'orderItem_Quantity' => 1,
        'orderItem_TotalPrice' => 119,
        'orderItem_Shipping_Price' => 1.65,
    ),
    (object) array(
        'beezUPOrderItemId' => 4,
        'orderItem_MerchantImportedProductIdColumnName' => 'id',
        'orderItem_MerchantProductIdColumnName' => 'id',
        'orderItem_BeezUPStoreId' => 'd1478a61-8514-494f-aeae-fa0cc716ac78',
        'orderItem_MerchantProductId' => 80024880,
        'orderItem_ItemPrice' => 119,
        'orderItem_Quantity' => 1,
        'orderItem_TotalPrice' => 119,
        'orderItem_Shipping_Price' => 1.65,
    ),
    (object) array(
        'beezUPOrderItemId' => 4,
        'orderItem_MerchantImportedProductIdColumnName' => 'id',
        'orderItem_MerchantProductIdColumnName' => 'id',
        'orderItem_BeezUPStoreId' => 'd1478a61-8514-494f-aeae-fa0cc716ac78',
        'orderItem_MerchantProductId' => 80024881,
        'orderItem_ItemPrice' => 119,
        'orderItem_Quantity' => 1,
        'orderItem_TotalPrice' => 119,
        'orderItem_Shipping_Price' => 1.65,
    )

);




$a = unique_line_product_worten($a);

echo '<pre>', print_r($a, true), '</pre>';

<?php

$attributes = array(
    'data-href'   => 'http://example.com',
    'data-width'  => '300',
    'data-height' => '250',
    'data-type'   => 'cover',
);

$dataAttributes = array_map(
    function ($key, $value) {
        return "$key => $value";
    },  array_keys($attributes), array_values($attributes)
);

$dataAttributes = implode(' | ', $dataAttributes);

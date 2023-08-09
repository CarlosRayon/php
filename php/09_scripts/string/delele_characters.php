<?php

$url = 'localhost/mipagina.com/condiciones.php?page=23';
echo strstr($url, '?');
// ?page=23

echo strstr($url, '?', true);
// localhost/mipagina.com/condiciones.php

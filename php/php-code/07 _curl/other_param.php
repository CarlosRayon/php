<?php

curl_setopt($conexion, CURLOPT_COOKIESESSION, false);
curl_setopt($conexion, CURLOPT_SSLVERSION, CURL_SSLVERSION_TLSv1_2);// Para poner el tipo de certificado
<span class="Apple-tab-span" style="white-space: pre;">  </span>curl_setopt($conexion, CURLOPT_USERPWD, "usuario:password");
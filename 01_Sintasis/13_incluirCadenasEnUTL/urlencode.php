<?php

/* 
 Para incluir cadenas en una URL
 */

    print 'window.open("email.php?email='.urlencode($email).'");';

//    urlencode($str);Para que la cadena se codifique y sea entendible por la url
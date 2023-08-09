<?php

/* https://github.com/amnesty/drupal-nif-nie-cif-validator/blob/master/includes/nif-nie-cif.php */

function isValidCIFFormat($docNumber)
{
    return
        respectsDocPattern(
            $docNumber,
            '/^[PQSNWR][0-9][0-9][0-9][0-9][0-9][0-9][0-9][A-Z0-9]/'
        ) or
        respectsDocPattern(
            $docNumber,
            '/^[ABCDEFGHJUV][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]/'
        );
}

function respectsDocPattern($givenString, $pattern)
{
    $isValid = false;

    $fixedString = strtoupper($givenString);

    if (is_int(substr($fixedString, 0, 1))) {
        $fixedString = substr("000000000" . $givenString, -9);
    }

    if (preg_match($pattern, $fixedString)) {
        $isValid = true;
    }

    return $isValid;
}

$cifs = [
    'W51d21001As',
    'G41315458',
    '21295C',
    'J81851107',
    'N0185434H',
    'U52991890',
    'A27446533',
    'H53657102',
    'S2476251J',
    'G00607093',
    'U24735524',
    'Q1934137I',
    'D48251177',
    'U87147765',
    'Q2149963G',
    'U24108664',
    'G49459043',
    'B74746132',
    'P7460654B',
    'G24423790',
    'W5653454H',
    'C15515430',
    'S4217468J',
    'W2768133G',
    'J49423908',
    'A44616878',
    'W4075309G',
    'F12441242',
    'V18199554',
    'Q1641987A',
    'U22378178',
    'D43936137',
    'Q1243290B',
    'A11366614',
    'J47295456',
    'W3291179D',
    'W1934491J',
    'R3257564I',
    'H01067933',
    'U09129024',
    'W5276770D',
    'Q0017743F',
    'G52221801',
    'G32050551',
    'F63144273',
    'R4603684D',
    'J27852672',
    'V47382171',
    'N2729891H'
];


foreach ($cifs as $cif) {
    var_dump(isValidCIFFormat($cif));
}

<?php

function getCifSum($cif)
{
    $sum = $cif[2] + $cif[4] + $cif[6];

    for ($i = 1; $i < 8; $i += 2) {
        $tmp = (string) (2 * $cif[$i]);

        $tmp = $tmp[0] + ((strlen($tmp) == 2) ? $tmp[1] : 0);

        $sum += $tmp;
    }

    return $sum;
}


function validateCif($cif)
{
    $cif_codes = 'JABCDEFGHI';

    $sum = (string) getCifSum($cif);
    $n = (10 - substr($sum, -1)) % 10;

    if (preg_match('/^[ABCDEFGHJNPQRSUVW]{1}/', $cif)) {
        if (in_array($cif[0], array('A', 'B', 'E', 'H'))) {
            // Numerico
            return ($cif[8] == $n);
        } elseif (in_array($cif[0], array('K', 'P', 'Q', 'S'))) {
            // Letras
            return ($cif[8] == $cif_codes[$n]);
        } else {
            // Alfanumérico
            if (is_numeric($cif[8])) {
                return ($cif[8] == $n);
            } else {
                return ($cif[8] == $cif_codes[$n]);
            }
        }
    }

    return false;
}


$cifs = [
    'C45808599',
    'G41315458',
    'P1621295C',
    'F81851107',
    'S0759363E',
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
    var_dump(validateCif($cif));
}

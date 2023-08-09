<?php
// PHP code to search for a specific string's position
// first occurrence using strpos() case-sensitive function
function Search($search, $string)
{
    $position = strpos($string, $search, 5);
    if ($position == true) {
        return true;
    } else {
        return false;
    }
}

// Driver Code
$string = "localhost/reeditor/bienvenido.php";
$search = "bienvenido";
echo Search($search, $string);

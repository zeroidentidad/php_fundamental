<?php
//closure: en php es referencia a funciones anonimas

// explicacion: https://anexsoft.com/implementacion-de-closures-en-php

$suma = function($a, $b){
    return $a + $b;
};

print $suma(2, 4). chr(10);

$suma2 = function($a, $b, $c){
    return $c($a + $b);
};

print $suma(2, 4). chr(10);

$suma2(23, 5, function($r){ echo $r; }). chr(10);

?>
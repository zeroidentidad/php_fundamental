<?php
namespace Libs\Matematica\Financiera;


function calculaInteres($capital, $tasa, $periodo){
    return (
       number_format ( $capital*(pow((1+$tasa),$periodo)), 2 ) // ** = pow()
    ); 
}

/* function resta($a, $b){
    return $a-$b;
}
function multiplicacion($a, $b){
    return $a*$b;
}
function division($a, $b){
    return $a/$b;
} */

?>
<?php
declare(strict_types=1);

function suma(int ...$valores) : int {

    //return (int) '2345'; // casting
    return array_sum($valores);
}

function interes(float $capital, float $tasa, int $periodo) : float {

    return(
        $capital*((1+$tasa)**$periodo)
    );
}

echo suma(1,2,4,6);

var_dump( round(interes(1587.25, 0.15, 2), 2) );

?>
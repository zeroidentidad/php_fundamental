<?php
namespace Clases\Matematica;

class Aritmetica {
    public static function suma(float $a, float $b) : float {
        return $a + $b;
    }

    public static function resta(float $a, float $b): float {
        return $a - $b;
    }

    public static function esPar(float $n){
        return self::calcularParOImpar($n);
    }

    public static function esImpar(float $n){
        return self::calcularParOImpar($n, false);  // en ambito func estatica no se puede usar "$this->" no es referencia valida
    }

    private static function calcularParOImpar(float $n, bool $par = true) : bool {
        if($par){
            return $n % 2 === 0;
        } else {
            return $n % 2 !== 0;
        }
    }
}
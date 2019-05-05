<?php
namespace Clases\Matematica;

class Aritmetica {

    public static function division(float $a, float $b): float {

        /*if ($b==0) {
            throw new \Exception("No se puede dividir entre 0"); // slash para ignorar namespace donde es contenido
        }*/

        return $a / $b;
    }

    public static function esPar(float $n){
        return self::calcularParOImpar($n);
    }

    public static function esImpar(float $n){
        return self::calcularParOImpar($n, false);
    }

    private static function calcularParOImpar(float $n, bool $par = true) : bool {
        if($par){
            return $n % 2 === 0;
        } else {
            return $n % 2 !== 0;
        }
    }
}
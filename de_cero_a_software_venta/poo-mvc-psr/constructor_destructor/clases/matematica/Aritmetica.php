<?php
namespace Clases\Matematica;

class Aritmetica {
    public function suma(float $a, float $b) : float {
        return $a + $b;
    }

    public function resta(float $a, float $b): float {
        return $a - $b;
    }

    public function esPar(float $n){
        return $this->calcularParOImpar($n);
    }

    public function esImpar(float $n){
        return $this->calcularParOImpar($n, false);
    }

    private function calcularParOImpar(float $n, bool $par = true) : bool { // en uso solo dentro de la clase
        if($par){
            return $n % 2 === 0;
        } else {
            return $n % 2 !== 0;
        }
    }
}
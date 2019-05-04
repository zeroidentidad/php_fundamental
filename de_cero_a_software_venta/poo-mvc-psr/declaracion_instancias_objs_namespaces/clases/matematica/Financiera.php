<?php
namespace Clases\Matematica;

class Financiera {
    public function tea(float $capital, float $tasa, int $periodo) : float {
        return $capital * ((1 + $tasa)**$periodo);
    }
}
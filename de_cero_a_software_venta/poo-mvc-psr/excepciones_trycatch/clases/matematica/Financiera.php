<?php
namespace Clases\Matematica;

class Financiera {
    private $capital;
    private $tasa;
    private $periodo;

    public function __construct(
        float $capital,
        float $tasa,
        int $periodo
    ) {
        $this->capital = $capital;
        $this->tasa = $tasa;
        $this->periodo = $periodo;
    }

    public function __destruct (){
        //echo 'Ha finalizado el calculo para financiera';
    }

    public function tea() : float {
        return $this->capital * ((1 + $this->tasa)**$this->periodo);
    }
}
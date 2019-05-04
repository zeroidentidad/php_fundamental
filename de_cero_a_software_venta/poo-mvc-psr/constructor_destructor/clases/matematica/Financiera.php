<?php
namespace Clases\Matematica;

class Financiera {

    private $capital;
    private $tasa;
    private $periodo;

    public function __construct(float $capital, float $tasa, int $periodo){
        $this->capital=$capital;
        $this->tasa=$tasa;
        $this->periodo=$periodo;
        var_dump($this);
    }

    public function __destruct(){
        $this->capital=0;
        $this->tasa=0;
        $this->periodo=0;
        var_dump($this);
    }

    public function tea() : float {
        return $this->capital * ((1 + $this->tasa)**$this->periodo);
    }
}
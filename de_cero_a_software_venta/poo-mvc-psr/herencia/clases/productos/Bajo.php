<?php

namespace Clases\Productos;
use Clases\ProductoBase;

class Bajo extends ProductoBase {
    public function __construct(int $cantidad){
        parent::__construct(1000, $cantidad, 0.2);
    }

    public function mostrarPrecioFinal(){
        return $this->calcularMonto();
    }
}

?>
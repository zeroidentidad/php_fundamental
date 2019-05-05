<?php

namespace Clases\Productos;
use Clases\ProductoBase;

class Guitarra extends ProductoBase {
    public function __construct(int $cantidad){
        parent::__construct(1200, $cantidad, 0.2);
    }

    public function mostrarPrecioFinal(){
        return $this->calcularMonto();
    }
}

?>
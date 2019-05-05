<?php
namespace Clases;

class Producto{

    use Traits\CalculoVenta;

    private $nombre;
    private $marca;
    private $precioUnitario;
    private $costoUnitario;

    public function __construct(
        string $nombre,
        string $marca,
        float $costoUnitario,
        float $precioUnitario
    ){
        $this-> nombre = $nombre;
        $this-> marca = $marca;
        $this-> precioUnitario = $precioUnitario;
        $this-> costoUnitario = $costoUnitario;

    }

    public function iva() :float {
        return $this->calcularPrecioConIva($this->precioUnitario);
    }

    public function margen() : float {
        return $this->margenDeGananciaUnitaria(
            $this->precioUnitario,
            $this->costoUnitario
        );
    }

    public function utilidad() :float {
        return $this->utilidadUnitaria(
            $this->precioUnitario,
            $this->costoUnitario
        );
    }    

}

?>
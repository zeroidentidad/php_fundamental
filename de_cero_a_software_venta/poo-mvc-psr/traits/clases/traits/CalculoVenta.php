<?php
namespace Clases\Traits;

trait CalculoVenta{
 
    private function calcularPrecioConIva(float $precio) : float{
        return $precio * 1.16;
    }

    private function utilidadUnitaria(float $precio, float $costo) : float{
        return $precio - $costo;
    }

    private function margenDeGananciaUnitaria(float $precio, float $costo) : float{
        $ingreso = $precio - $costo;
        return round(($ingreso / $costo) * 100);
    }    
    
}

?>
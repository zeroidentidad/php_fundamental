<?php
require_once 'clases/traits/CalculoVenta.php';
require_once 'clases/Producto.php';

$obj = new Clases\Producto('Laptop', 'Anexsoft', 1000, 2000);
var_dump(
    $obj->margen()
);

?>
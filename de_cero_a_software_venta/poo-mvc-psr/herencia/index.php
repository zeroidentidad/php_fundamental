<?php

require_once 'clases/ProductoBase.php';
require_once 'clases/productos/Bajo.php';
require_once 'clases/productos/Guitarra.php';
require_once 'clases/productos/Bateria.php';

use Clases\Productos\{Bajo,Guitarra,Bateria};

$instrumento = new Bajo(2);

var_dump($instrumento->mostrarPrecioFinal());

?>
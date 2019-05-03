<?php
// operador null : ??

$usuario_id = $_GET["id"] ?? 1;

var_dump($usuario_id);

// operador nave espacial : <=>

$i = 15;

switch ($i<=>5) {
    case -1:
        echo "es menor";
        break;

    case 0:
        echo "es igual";
        break;

    case 1:
        echo "es mayor";
        break;
}

?>
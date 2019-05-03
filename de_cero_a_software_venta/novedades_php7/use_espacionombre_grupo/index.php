<?php
require_once './libs/matematica/aritmetica/formula.php';
require_once './libs/matematica/financiera/formula.php';

use function Libs\Matematica\Aritmetica\{suma, multiplicacion};

echo suma(125,100) .'<br/>';
echo multiplicacion(10,5);

?>
<?php
require_once './libs/matematica/aritmetica/formula.php';
require_once './libs/matematica/financiera/formula.php';

echo Libs\Matematica\Aritmetica\suma(12, 13) .chr(10);

echo Libs\Matematica\Financiera\calculaInteres(10000, 0.09, 2) .chr(10);

?>
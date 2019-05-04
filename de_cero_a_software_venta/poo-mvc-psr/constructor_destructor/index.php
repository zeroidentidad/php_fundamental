<?php
require_once 'clases/matematica/Aritmetica.php';
require_once 'clases/matematica/Financiera.php';

use Clases\Matematica\{Aritmetica, Financiera};

$obj = new Financiera(10000,0.25,2);
var_dump($obj->tea());
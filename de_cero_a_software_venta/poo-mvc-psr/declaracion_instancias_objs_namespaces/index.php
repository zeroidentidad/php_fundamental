<?php
require_once 'clases/matematica/Aritmetica.php';
require_once 'clases/matematica/Financiera.php';

use Clases\Matematica\{Aritmetica, Financiera};

$obj = new Aritmetica();
var_dump($obj->esImpar(1));
<?php
function exception_error_handler($severidad, $mensaje, $fichero, $línea) {
    if (!(error_reporting() & $severidad)) {
        // Este código de error no está incluido en error_reporting
        return;
    }
    throw new ErrorException($mensaje, 0, $severidad, $fichero, $línea);
}
set_error_handler("exception_error_handler");

require_once 'clases/matematica/Aritmetica.php';
require_once 'clases/matematica/Financiera.php';

use Clases\Matematica\{Aritmetica, Financiera};

try{
    echo Aritmetica::division(10, 0); //strpos();
} catch(Exception $e) {
    echo $e->getMessage();
}


<?php
// Errores de PHP a Try/Catch
function exception_error_handler($severidad, $mensaje, $fichero, $línea) {
    if (!(error_reporting() & $severidad)) {
        // Este código de error no está incluido en error_reporting
        return;
    }
    throw new ErrorException($mensaje, 0, $severidad, $fichero, $línea);
}

set_error_handler("exception_error_handler");

// Composer
require_once 'vendor/autoload.php';

// path
define('_VIEW_PATH_', 'app/views/');

// Router
$c = sprintf(
    'App\Controllers\%sController',
    $_GET['c'] ?? 'Home'
);

$a = $_GET['a'] ?? 'index';

$c = trim(ucfirst($c));
$a = trim(strtolower($a));

$controller = new $c;
$controller->$a();
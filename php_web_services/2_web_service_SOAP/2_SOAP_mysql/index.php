<?php
require_once './vendor/autoload.php';

$cliente = new nusoap_client("http://phpdocs.local/php_fundamental/php_web_services/2_web_service_SOAP/2_SOAP_mysql/soap_server.php");

$libros = $cliente->call("mostrarLibros");

echo "<h2>Libros</h2>";

echo "<ul>";
foreach ($libros as $libro) {
    echo "<li>".$libro["id"]." - ".$libro["autor"]." - <b>".$libro["titulo"]."</b></li>";
    echo "<br>";
}
echo "</ul>";

?>
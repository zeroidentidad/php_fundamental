<?php
require_once './vendor/autoload.php';

$cliente = new nusoap_client("http://phpdocs.local/php_fundamental/php_web_services/2_web_service_SOAP/1_SOAP_basico/webservice_SOAP.php?wsdl&debug=0", 'wsdl');

$cliente->soap_defencoding = 'UTF-8';
$cliente->decode_utf8 = FALSE;

$info = $cliente->call("mostrarInfo");
$imagen = $cliente->call("mostrarImagen", array('categoria'=>'espacio'));
$imagen2 = $cliente->call("mostrarImagen", array('categoria'=>''));

echo "<h2>La info</h2>";
echo "<p>".$info."</p>";

echo "<h2>Imagen</h2>";
echo "<div align='center'>".$imagen."</div>";

echo "<h2>Imagen 2</h2>";
echo "<div align='center'>".$imagen2."</div>";

?>
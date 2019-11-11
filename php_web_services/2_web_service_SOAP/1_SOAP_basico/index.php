<?php
require_once './vendor/autoload.php';

$cliente = new nusoap_client("http://phpdocs.local/php_fundamental/php_web_services/2_web_service_SOAP/1_SOAP_basico/webservice_SOAP.php");

$cliente->soap_defencoding = 'UTF-8';
$cliente->decode_utf8 = FALSE;

$info = $cliente->call("mostrarInfo");

echo "<h2>La info</h2>";
echo "<p>".$info."</p>";

?>
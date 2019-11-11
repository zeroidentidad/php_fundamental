<?php
require_once './vendor/autoload.php';

$cliente = new nusoap_client("https://www.dataaccess.com/webservicesserver/NumberConversion.wso?wsdl", 'wsdl');

$resultado = $cliente->call("NumberToWords",array("ubiNum"=>2019));

//print_r($resultado);

$towords = $resultado['NumberToWordsResult'];

echo '<br> <b>'.$towords.'</b>';

?>
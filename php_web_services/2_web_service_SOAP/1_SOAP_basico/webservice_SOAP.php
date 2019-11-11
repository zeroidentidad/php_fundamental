<?php
require_once './vendor/autoload.php';

function mostrarInfo(){
    $info = "lorem ipsum ina dolor, watahea watahea madafakas";

    return $info;
}

if (!isset($HTTP_RAW_POST_DATA)) {
    $HTTP_RAW_POST_DATA = file_get_contents('php://input');
}

$server = new soap_server();
$server->register("mostrarInfo");

$server->service($HTTP_RAW_POST_DATA);

?>
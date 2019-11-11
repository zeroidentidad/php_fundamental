<?php
require_once './vendor/autoload.php';

function mostrarInfo(){
    $info = "lorem ipsum ina dolor, watahea watahea madafakas";

    return $info;
}

function mostrarImagen($categoria){
    if($categoria=='espacio'){
        $imagen='imagen.jpg';
    }else {
        $imagen='imagen2.jpg';
    }

    $resultado = '<img src="img/'.$imagen.'" >';

    return $resultado;
}

if (!isset($HTTP_RAW_POST_DATA)) {
    $HTTP_RAW_POST_DATA = file_get_contents('php://input');
}

$server = new soap_server();

$server->configureWSDL("Titulo X", "urn:infoWeb");

$server->register("mostrarInfo",
array(), //parametro
array('return'=>'xsd:string'), //respuesta
'urn:infoWeb', //namespace
'urn:infoWeb#mostrarInfo', //accion
'rpc', //estilo
'encoded', //uso
'Muestra info x' //descripcion
);
$server->register("mostrarImagen",
array('categoria'=>'xsd:string'), //parametro
array('return'=>'xsd:string'), //respuesta
'urn:infoWeb', //namespace
'urn:infoWeb#mostrarImagen', //accion
'rpc', //estilo
'encoded', //uso
'Muestra imagen X' //descripcion
);

$server->service($HTTP_RAW_POST_DATA);

?>
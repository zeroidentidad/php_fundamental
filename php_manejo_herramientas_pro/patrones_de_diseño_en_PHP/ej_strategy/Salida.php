<?php
interface InterfazSalida {
    public function load();
}

class ArraySalida implements InterfazSalida {
    public function load(){
        return $array_datos;
    }
}

class JsonSalida implements InterfazSalida {
    public function load(){
        return json_encode($array_datos);
    }
}

class Cliente {
    private $salida;

    public function setTipoSalida($tipoSalida){
        $this->salida = $tipoSalida;
    }

    public function loadSalida(){
        return $this->salida->load(); // de la interface
    }
}

$cliente = new Cliente();
$cliente->setTipoSalida(new ArraySalida());
$datos = $cliente->loadSalida();

$cliente->setTipoSalida(new JsonSalida()); //cambio de tipo de salida
$json = $cliente->loadSalida();

var_dump($datos);
var_dump($json);
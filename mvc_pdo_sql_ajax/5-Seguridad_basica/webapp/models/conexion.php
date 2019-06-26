<?php

class Conexion{

	public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=tema_pdo_sql","remoto","x1234567");
		return $link;
		//var_dump($link);

	}

}

/* $a = new Conexion();
$a->conectar(); */
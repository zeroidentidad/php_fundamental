<?php

class Conexion{

	public function conectar(){

		$link = new PDO("pgsql:host=localhost;dbname=tema_pdo_sql","postgres","x1234567");
		return $link;
		//var_dump($link);

	}

}

/* $a = new Conexion();
$a->conectar(); */

?>
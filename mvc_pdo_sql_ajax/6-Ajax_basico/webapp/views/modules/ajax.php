<?php

require_once "../../controllers/controller.php";
require_once "../../models/crud.php";

class Ajax{

	public $validarUsuario;
	public $validarEmail;

	public function validarUsuarioAjax(){

		$datos = $this->validarUsuario;

		$obj = new MvcController();
		$respuesta = $obj->validarUsuarioController($datos); 

		echo $respuesta;
	}

	public function validarEmailAjax(){

		$datos = $this->validarEmail;

		$obj = new MvcController();
		$respuesta = $obj->validarEmailController($datos); 

		echo $respuesta;
	}

}

if(isset( $_POST["validarUsuario"])){
	$validUser = new Ajax();
	$validUser -> validarUsuario = $_POST["validarUsuario"];
	$validUser -> validarUsuarioAjax();
}

if(isset( $_POST["validarEmail"])){
	$validEmail = new Ajax();
	$validEmail -> validarEmail = $_POST["validarEmail"];
	$validEmail -> validarEmailAjax();
}


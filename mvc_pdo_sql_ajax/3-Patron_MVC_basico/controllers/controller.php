<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#----------------------------------------------

	public function plantilla(){

		#include() para invocar el archivo que contiene código html.
		include "views/template.php";
	}

	#INTERACCIÓN DEL USUARIO
	#----------------------------------------------
	public function enlacesPaginasController(){

		if(isset($_GET["action"])){
		$enlacesController = $_GET["action"];
		}
		else {
		$enlacesController = "index";	
		}

		$obj = new EnlacesPaginas();
		$respuesta = $obj->enlacesPaginasModel($enlacesController);

		include $respuesta;

	}
}

?>
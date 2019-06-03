<?php

class EnlacesPaginas{

	public function enlacesPaginasModel($enlacesModel){

		$arrVal = array("nosotros", "servicios", "contacto");

		if(in_array($enlacesModel, $arrVal)){
			$module = "views/modules/".$enlacesModel.".php";
		}
		else if($enlacesModel == "index" ){
			$module = "views/modules/inicio.php";
		}
		else{
			$module = "views/modules/inicio.php";
		}

		return $module;

	}

}

?>
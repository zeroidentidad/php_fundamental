<?php 

// con la funcion filter_var comprobar si email recbibido por GET es valido

function validaEmail($email){
	if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$estado = 'VALIDO';
	}else{
		$estado = ' NO VALIDO';
	}

	return $estado;
}

$email = '';

if (isset($_GET["email"])) {
	$email = $_GET["email"];
}

echo validaEmail($email);

 ?>
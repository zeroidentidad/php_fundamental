<h1>INGRESAR</h1>

	<form method="post" onsubmit="return validarIngreso()">
		
		<label for="usuarioIngreso">Usuario</label>
		<input type="text" maxlength="6" placeholder="Usuario" name="usuarioIngreso" id="usuarioIngreso" required>

		<label for="passwordIngreso">Contraseña</label>
		<input type="password" placeholder="Contraseña" name="passwordIngreso" id="passwordIngreso" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required>

		<input type="submit" value="Enviar">

	</form>

<?php
$ingreso = new MvcController();
$ingreso -> ingresoUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "fallo"){

		echo "Error al ingresar";
	
	}

	if($_GET["action"] == "fallo4intentos"){

		echo "Ha fallado 4 veces para ingresar, favor llenar el captcha";
	
	}	

}
?>
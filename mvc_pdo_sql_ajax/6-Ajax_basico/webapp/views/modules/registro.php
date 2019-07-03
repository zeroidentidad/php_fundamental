<h1>REGISTRO DE USUARIO</h1>

<form method="post" onsubmit="return validarRegistro()">
	
	<label for="usuarioRegistro">Usuario<span></span></label>
	<input type="text" placeholder="Máximo 6 caracteres" maxlength="6" name="usuarioRegistro" id="usuarioRegistro" required>

	<label for="passwordRegistro">Contraseña</label>
	<input type="password" placeholder="mínimo 6 caracteres, incluir número(s) y una mayúscula" name="passwordRegistro" id="passwordRegistro" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" required>

	<label for="emailRegistro">Correo electrónico<span></span></label>
	<input type="email" placeholder="escriba su correo electrónico correctamente" name="emailRegistro" id="emailRegistro" required>

	<p style="text-align:center">
	<input type="checkbox" id="terminos"><a href="#">Acepta términos y condiciones</a>
	</p>

	<input type="submit" value="Enviar">

</form>

<?php
$registro = new MvcController();
$registro->registroUsuarioController();

if(isset($_GET["action"])){

	if($_GET["action"] == "ok"){

		echo "Registro Exitoso";
	
	}
}
?>

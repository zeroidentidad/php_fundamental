<?php include 'includes/redirect.php'; ?>
<?php require_once 'includes/header.php'; ?>
<?php
function mostrarError($errors, $field){
	if(isset($errors[$field]) && !empty($field)){
		$alert = '<div class="alert alert-danger" style="margin-top:5px;">'.$errors[$field].'</div>';
	}else{
		$alert = '';
	}
	return $alert;
}

function setValor($errors, $field, $textarea = false){
	if(isset($errors) && count($errors)>=1 && isset($_POST[$field])){ 
		if($textarea != false){
			echo $_POST[$field];
		}else{
			echo "value='{$_POST[$field]}'"; 
		}
	}
}

$errors = array();
if(isset($_POST["submit"])){
	
	if(!empty($_POST["nombre"]) && strlen($_POST["nombre"])<=20
		&& !is_numeric($_POST["nombre"]) && !preg_match("/[0-9]/", $_POST["nombre"])){
		$validar_nombre = true;
}else{
	$validar_nombre = false;
	$errors["nombre"] = "El nombre no es válido.";
}

if(!empty($_POST["apellido"]) && !is_numeric($_POST["apellido"]) && !preg_match("/[0-9]/", $_POST["apellido"])){
	$validar_apellido = true;
}else{
	$validar_apellido = false;
	$errors["apellido"] = "Los apellidos no son válidos.";
}

if(!empty($_POST["bio"])){
	$validar_bio = true;
}else{
	$validar_bio = false;
	$errors["bio"] = "La biografia no puede estar vacía";
}

if(!empty($_POST["email"]) && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
	$validar_email = true;
}else{
	$validar_email = false;
	$errors["email"] = "Introduce un email correcto";
}

if(!empty($_POST["contrasena"]) && strlen($_POST["contrasena"])>=6){
	$validar_contrasena = true;
}else{
	$validar_contrasena = false;
	$errors["contrasena"] = "Introduce una contraseña de más de 6 caracteres";
}

if(isset($_POST["rol"]) && is_numeric($_POST["rol"])){
	$validar_rol = true;
}else{
	$validar_rol = false;
	$errors["rol"] = "Selecciona un rol de usuario";
}

$imagen = null;
if(isset($_FILES["imagen"]) && !empty($_FILES["imagen"]["tmp_name"])){

	if(!is_dir("uploads")){
		$dir = mkdir("uploads",0777,true);
	}else{
		$dir = true;
	}

	if($dir){
		$filename = time()."-".$_FILES["imagen"]["nombre"];
		$mover = move_uploaded_file($_FILES["imagen"]["tmp_name"], "uploads/".$filename);

		$imagen = $filename;

		if($mover){
			$imagen_upload = true;
		}else{
			$imagen_upload = false;
			$errors["imagen"] = "La imagen no se ha subido bien";
		}
	}
}

	// Insertar usuario en la BD
if(count($errors)==0){
	$sql = "INSERT INTO usuarios VALUES(NULL, '{$_POST["nombre"]}', '{$_POST["apellido"]}', '{$_POST["bio"]}', '{$_POST["email"]}', '".sha1($_POST["contrasena"])."', '{$imagen}', '{$_POST["rol"]}');";
	$insert_usuario = mysqli_query($db, $sql);
}else{
	$insert_usuario = false;
}

}

?>
<h2>Crear usuarios</h2>
<?php if(isset($_POST["submit"]) && count($errors)==0 && $insert_usuario != false){ ?>
	<div class="alert alert-success">
		El usuario se ha creado correctamente !!
	</div>
<?php } ?>
<form action="" method="POST" enctype="multipart/form-data">

	<label for="nombre">Nombre:
		<input type="text" name="nombre" class="form-control" <?php setValor($errors, "nombre"); ?>/> 
		<?php echo mostrarError($errors, "nombre"); ?>
	</label>
	<br/>
	<label for="apellido">
		Apellidos:
		<input type="text" name="apellido" class="form-control" <?php setValor($errors, "apellido"); ?>/> 
		<?php echo mostrarError($errors, "apellido"); ?>
	</label>
	<br/>
	<label for="bio">
		Biografia:
		<textarea name="bio" class="form-control"><?php setValor($errors, "bio", true); ?></textarea>
		<?php echo mostrarError($errors, "bio"); ?>
	</label>
	<br/>
	<label for="email">
		Correo:
		<input type="email" name="email" class="form-control" <?php setValor($errors, "email"); ?>/> 
		<?php echo mostrarError($errors, "email"); ?>
	</label>
	<br/>
	<label for="imagen">
		Imagen:
		<input type="file" name="imagen" class="form-control" /> 
	</label>
	<br/>
	<label for="contrasena">
		Contraseña:
		<input type="password" name="contrasena" class="form-control" />
		<?php echo mostrarError($errors, "contrasena"); ?>
	</label>
	<br/>
	<label for="rol">
		Rol:
		<select name="rol" class="form-control">
			<option value="1">Normal</option>
			<option value="2">Administrador</option>
		</select>
		<?php echo mostrarError($errors, "rol"); ?>
	</label>
	<br/>
	<input type="submit" value="Enviar" name="submit" class="btn btn-success" />
</form>
<?php require_once 'includes/footer.php'; ?>
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

function setValor($data, $field, $textarea = false){
	if(isset($data) && count($data)>=1){ 
		if($textarea != false){
			echo $data[$field];
		}else{
			echo "value='{$data[$field]}'"; 
		}
	}
}

// Conseguir usuario
if(!isset($_GET["id"]) || empty($_GET["id"]) || !is_numeric($_GET["id"])){
	header("Location:index.php");
}

$id = $_GET["id"]; 
$usuario_query = mysqli_query($db, "SELECT * FROM usuarios WHERE usuario_id = {$id}");
$usuario = mysqli_fetch_assoc($usuario_query);

if(!isset($usuario["usuario_id"]) || empty($usuario["usuario_id"])){
	header("Location:index.php");
}

// Validar el formulario
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
				$errors["imagen"] = "La imagen NO se ha subido bien";
			}
		}
	}
	
	// Update usuario en la BD
	if(count($errors)==0){
		$sql = "UPDATE usuarios set name = '{$_POST["nombre"]}', "
		. "apellido = '{$_POST["apellido"]}', "
		. "bio = '{$_POST["bio"]}', "
		. "email = '{$_POST["email"]}', ";
		
		if(isset($_POST["contrasena"]) && !empty($_POST["contrasena"])){
			$sql.= "contrasena = '".sha1($_POST["contrasena"])."', ";
		}
		
		if(isset($_FILES["imagen"]) && !empty($_FILES["imagen"]["tmp_name"])){
			$sql.= "imagen = '{$imagen}', ";
		}
		
		$sql.= "role = '{$_POST["rol"]}' WHERE usuario_id = {$usuario["usuario_id"]};";
		
		$update_user = mysqli_query($db, $sql);
		
		if($update_user){
			$usuario_query = mysqli_query($db, "SELECT * FROM usuarios WHERE usuario_id = {$id}");
			$usuario = mysqli_fetch_assoc($usuario_query);
		}
		
	}else{
		$update_user = false;
	}
	
}

?>
<h2>Editar usuario <?php echo $usuario["usuario_id"]." - ".$usuario["nombre"]." ".$usuario["apellido"]; ?></h2>
<?php if(isset($_POST["submit"]) && count($errors)==0 && $update_user != false){ ?>
	<div class="alert alert-success">
		El usuario se ha actualizado correctamente !!
	</div>
<?php }elseif(isset($_POST["submit"])){ ?>
	<div class="alert alert-danger">
		El usuario NO se ha actualizado !!
	</div>
<?php } ?>
<form action="" method="POST" enctype="multipart/form-data">
	<label for="nombre">Nombre:
		<input type="text" name="nombre" class="form-control" <?php setValor($usuario, "nombre"); ?>/> 
		<?php echo mostrarError($errors, "nombre"); ?>
	</label>
	<br/>
	<label for="apellido">
		Apellidos:
		<input type="text" name="apellido" class="form-control" <?php setValor($usuario, "apellido"); ?>/> 
		<?php echo mostrarError($errors, "apellido"); ?>
	</label>
	<br/>
	<label for="bio">
		Biografia:
		<textarea name="bio" class="form-control"><?php setValor($usuario, "bio", true); ?></textarea>
		<?php echo mostrarError($errors, "bio"); ?>
	</label>
	<br/>
	<label for="email">
		Correo:
		<input type="email" name="email" class="form-control" <?php setValor($usuario, "email"); ?>/> 
		<?php echo mostrarError($errors, "email"); ?>
	</label>
	<br/>
	<label for="imagen">
	<?php if($usuario["imagen"] != null){ ?>
		Imagen de perfil:<img src="uploads/<?php echo $usuario["imagen"] ?>" width="150" height="150" /><br/>
	<?php } ?>
		Actualizar imagen de perfil:
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
			<option value="1" <?php if($usuario["rol"] == 1){ echo "selected='selected'"; } ?>>Normal</option>
			<option value="2" <?php if($usuario["rol"] == 2){ echo "selected='selected'"; } ?>>Administrador</option>
		</select>
		<?php echo mostrarError($errors, "rol"); ?>
	</label>
	<br/>
	<input type="submit" value="Enviar" name="submit" class="btn btn-success" />
</form>
<?php require_once 'includes/footer.php'; ?>
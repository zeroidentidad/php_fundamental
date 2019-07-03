<?php

class MvcController{

	#LLAMADA A LA PLANTILLA
	#-------------------------------------

	public function pagina(){	
		
		include "views/template.php";
	
	}

	#ENLACES
	#-------------------------------------
	public function enlacesPaginasController(){

		if(isset( $_GET['action'])){
			$enlaces = $_GET['action'];
		}
		else{
			$enlaces = "index";
		}

		$obj= new Paginas();
		$respuesta = $obj->enlacesPaginasModel($enlaces);

		require_once $respuesta;
	}

	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){		

		if(isset($_POST["usuarioRegistro"])){

			#preg_match = Realiza una comparación con una expresión regular

			if(
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioRegistro"]) && 
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordRegistro"]) && 
			preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailRegistro"])
			){

				#crypt() devolverá el hash de un string utilizando el algoritmo estándar basado en DES de Unix o algoritmos alternativos que puedan estar disponibles en el sistema.

				$encriptar = crypt($_POST["passwordRegistro"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');				

				$datosController = array( "usuario"=>$_POST["usuarioRegistro"], 
										"password"=>$encriptar,
										"email"=>$_POST["emailRegistro"]);

				$obj = new Datos();						  
				$respuesta = $obj->registroUsuarioModel($datosController, "usuarios");

				if($respuesta == "success"){
					header("location:ok");
				}
				else{
					header("location:index.php");
				}

			}

		}

	}

	#INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuarioIngreso"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioIngreso"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordIngreso"])){

				$encriptar = crypt($_POST["passwordIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array( "usuario"=>$_POST["usuarioIngreso"], 
										"password"=>$encriptar);
				
				$obj = new Datos();							  
				$respuesta = $obj->ingresoUsuarioModel($datosController, "usuarios");

				$intentos = $respuesta["intentos"];
				$usuario = $_POST["usuarioIngreso"];
				$maximoIntentos = 3;

				if($intentos < $maximoIntentos){
					if($respuesta["usuario"] == $_POST["usuarioIngreso"] && $respuesta["password"] == $encriptar){
						session_start();

						$_SESSION["validar"] = true;

						$intentos = 0;

						$datos = array("usuarioActual"=>$usuario, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = $obj->intentosUsuarioModel($datos, "usuarios");						
						header("location:usuarios");
					}
					else{
						++$intentos;

						$datos = array("usuarioActual"=>$usuario, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = $obj->intentosUsuarioModel($datos, "usuarios");

						header("location:fallo");
					}
				}
				else{

					$intentos = 0;

					$datos = array("usuarioActual"=>$usuario, "actualizarIntentos"=>$intentos);

					$respuestaActualizarIntentos = $obj->intentosUsuarioModel($datos, "usuarios");

					header("location:fallo4intentos");
				}

			}
		}	

	}

	#VISTA DE USUARIOS
	#------------------------------------
	public function vistaUsuariosController(){

		$obj = new Datos();
		$respuesta = $obj->vistaUsuariosModel("usuarios");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';
		}

	}

	#EDITAR USUARIO
	#------------------------------------
	public function editarUsuarioController(){

		$datosController = $_GET["id"];
		$obj = new Datos();
		$respuesta = $obj->editarUsuarioModel($datosController, "usuarios");

		echo'<input type="hidden" value="'.$respuesta["id"].'" name="idEditar">

			 <label for="usuarioEditar">Usuario</label>
			 <input type="text" value="'.$respuesta["usuario"].'" maxlength="6" name="usuarioEditar" id="usuarioEditar" required>

			 <label for="passwordEditar">Contraseña</label>
			 <input type="text" value="'.$respuesta["password"].'" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" name="passwordEditar" id="passwordEditar" required>

			 <label for="emailEditar">Correo electrónico</label>
			 <input type="email" value="'.$respuesta["email"].'" name="emailEditar" id="emailEditar" required>

			 <input type="submit" value="Actualizar">';

	}

	#ACTUALIZAR USUARIO
	#------------------------------------
	public function actualizarUsuarioController(){

		if(isset($_POST["usuarioEditar"])){

			if(
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuarioEditar"]) && 
			preg_match('/^[a-zA-Z0-9]+$/', $_POST["passwordEditar"]) && 
			preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["emailEditar"])
			){

				$encriptar = crypt($_POST["passwordEditar"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array( "id"=>$_POST["idEditar"],
										"usuario"=>$_POST["usuarioEditar"],
										"password"=>$encriptar,
										"email"=>$_POST["emailEditar"]);
				$obj = new Datos();
				$respuesta = $obj->actualizarUsuarioModel($datosController, "usuarios");

				if($respuesta == "success"){
					header("location:cambio");
				}
				else{
					echo "error";
				}
			}

		}
	
	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarUsuarioController(){

		if(isset($_GET["idBorrar"])){

			$datosController = $_GET["idBorrar"];
			
			$obj = new Datos();
			$respuesta = $obj->borrarUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				header("location:usuarios");
			
			}

		}

	}

	#VALIDAR USUARIO EXISTENTE
	#-------------------------------------
	public function validarUsuarioController($validarUsuario){

		$datosController = $validarUsuario;
		$obj = new Datos();
		$respuesta = $obj->validarUsuarioModel($datosController, "usuarios");

		if(count($respuesta["usuario"]) > 0){
			echo 0;
		}
		else{
			echo 1;
		}

	}

	#VALIDAR EMAIL EXISTENTE
	#-------------------------------------
	public function validarEmailController($validarEmail){

		$datosController = $validarEmail;
		$obj = new Datos();
		$respuesta = $obj->validarEmailModel($datosController, "usuarios");

		if(count($respuesta["email"]) > 0){
			echo 0;
		}
		else{
			echo 1;
		}

	}	

}

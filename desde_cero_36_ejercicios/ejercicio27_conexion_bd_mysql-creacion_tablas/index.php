<?php 
require_once 'conexion.php';
/* conectarse a bd mysql, crear tabla de usuarios con los mismo del ejercicio anterior */

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 </head>
 <body>

 	<form method="POST" action="recibir.php" enctype="multipart/form-data">
 		<label for="nombre">Nombre:</label>
 		<input type="text" name="nombre"><br/>
 		<label for="apellido">Apellido:</label>
 		<input type="text" name="apellido"><br/>
 		<label for="bio">Biografia:</label>
 		<textarea name="bio"></textarea><br/>
 		<label for="email">Email:</label>
 		<input type="email" name="email"><br/>
 		<label for="imagen">Imagen:</label>
 		<input type="file" name="imagen"><br/>
 		<label for="contrasena">Contraseña:</label>
 		<input type="password" name="contrasena"><br/>
 		<label for="rol">Rol:</label>
 		<select name="rol">
 			<option value="1">Normie</option>
 			<option value="2">Admin</option>
 		</select><br/><br/>
 		<input type="submit" value="Enviar" name="enviar">
 	</form>

 </body>
 </html>
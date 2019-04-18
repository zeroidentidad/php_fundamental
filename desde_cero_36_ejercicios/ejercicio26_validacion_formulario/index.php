<?php 

/* validar formulario por medio de reglas de uso definidas:

Nombre: Solo puede estar formado por letras y tener longitud máxima de 20 caracteres.

Apellidos: Solo puede estar formado por letras

Biografia: No puede estar vacio

Email: ser email valido

Contraseña: Longitud mayor de 6 caracteres

Imagen: Puede estar vacia */

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
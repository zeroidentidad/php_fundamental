<?php 

require_once 'conexion.php';

$sql = "SELECT nombre, apellido, email, usuario_id FROM usuarios;";

$select_usuarios = mysqli_query($db, $sql);

 ?>

 <table border="1">
 	<tr>
 		<th>Nombre</th>
 		<th>Apellido</th>
 		<th>Email</th>
 	</tr>
 	<?php 
 	while ($usuario = mysqli_fetch_assoc($select_usuarios)){
 	?>
 	<tr>
 		<td><?=$usuario["nombre"]?></td>
 		<td><?=$usuario["apellido"]?></td>
 		<td><?=$usuario["email"]?></td>
 		<td><a href='./detalle.php?id=<?=$usuario["usuario_id"]?>' >Ver detalle</a></td>
 	</tr> 	
 	<?php
 	}
 	?>
 </table>
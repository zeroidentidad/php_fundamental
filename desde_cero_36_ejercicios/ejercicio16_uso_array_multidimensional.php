<?php 

// crear array con contenido a manera de tabla

$tabla = array(
	"Frutas" => array("Manzana","Naranja","Sandia","Fresa"),
	"Deportes" => array("Futbol", "Tenis", "Baloncesto", "Beisbol"),
	"Idiomas" => array("Español","Ingles","Frances","Italiano")
);

var_dump($tabla);

 ?>

<table border="1">
	<tr>
		<th>Frutas</th>
		<th>Deportes</th>
		<th>Idiomas</th>
	</tr>
	<tr>
		<td><?= $tabla["Frutas"][0] ?></td>
		<td><?= $tabla["Deportes"][0] ?></td>
		<td><?= $tabla["Idiomas"][0] ?></td>
	</tr>
	<tr>
		<td><?= $tabla["Frutas"][1] ?></td>
		<td><?= $tabla["Deportes"][1] ?></td>
		<td><?= $tabla["Idiomas"][1] ?></td>
	</tr>
	<tr>
		<td><?= $tabla["Frutas"][2] ?></td>
		<td><?= $tabla["Deportes"][2] ?></td>
		<td><?= $tabla["Idiomas"][2] ?></td>
	</tr>
	<tr>
		<td><?= $tabla["Frutas"][3] ?></td>
		<td><?= $tabla["Deportes"][3] ?></td>
		<td><?= $tabla["Idiomas"][3] ?></td>
	</tr>
</table>
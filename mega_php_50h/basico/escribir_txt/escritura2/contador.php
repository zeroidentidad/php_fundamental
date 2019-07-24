<?php
//abrimos el archivo visitas.txt
$recurso = fopen('visitas.txt','r+');

$nb_visitas = fgets($recurso); //Lectura de la primera línea que contiene el número de páginas visitadas

if($nb_visitas == ""){ //comprueba si el archivo todavía está vacío
	$nb_visitas = 0;
}

$nb_visitas++; //aumentamos el número de visitas en uno cada vez que se ejecuta este archivo

fseek($recurso, 0); //conseguimos ir al principio del archivo

fputs($recurso, $nb_visitas); //escribimos el nuevo número de páginas visitadas

fclose($recurso);//cierre del archivo

$felicitacion = "";

if($nb_visitas > 30){
	$felicitacion = "Enhorabuena. Has llegado a las 30 visitas";
}
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Visitas</title>
<style type="text/css">
*{
	margin:0;
	padding:0;
}
body{
	font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
	background:#F3EFC9;
}
.contenedor{
	width:400px;
	margin:100px auto;
	border:3px solid blue;
	background:gray;
	padding-top:1.5em;
	border-radius:2em;
}
.contenedor p{
	text-align:center;
	font-size:2em;
}
.contenedor span{
	font-size:4em;
	font-weight:bold;
	color:red;
}
article{
	font-size:2em;
	color:blue;
	text-align:center;
	font-weight:bold;
}
</style>
</head>

<body>
<div class="contenedor">
<p>Número de visitas <span><?php echo $nb_visitas ?></span></p>
</div>
<article><?php echo $felicitacion ?></article>
</body>
</html>
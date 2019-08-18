<?php

include("Soporte.php");
$soporte = new Soporte('Los Otros','F104',10);
//$imprimir = $soporte->imprime_caracteristcas();
$titulo = $soporte->titulo;
$precio_sin_iva = $soporte->dame_precio_sin_iva();
$precio_total = $soporte->dame_precio_con_iva();

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>App Vídeos Vintage</title>
<style>
*{
	margin:0;
	padding:0;
}
body{
	background:rgba(238,233,164,1.00);
	font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
}
section{
	width:300px;
	height:250px;
	padding:1em;
	box-sizing:border-box;
	background:#fff;
	color:orange;
	border:2px solid orange;
	border-radius:25px;
	margin:100px auto;
}
h1{
	font-size:1.3em;
	font-weight:normal;
	text-align:center;
}
p{
	color:grey;
	margin:10px 0 0 0;
	text-align:center;
}
</style>
</head>

<body>
<section>
<h1><?= $titulo ?></h1>
<p>Precio Sin IVA: <?= $precio_sin_iva ?>$</p>
<p>Precio Con IVA: <?= $precio_total ?>$</p>
</section>
</body>
</html>
<?php

include("Soporte.php");
include("CintaVideo.php");

//$soporte = new Soporte('Los Otros','F104',10);
//$imprimir = $soporte->imprime_caracteristcas();
//$imprime = $soporte->imprime_caracteristicas();

$cintavideo1 = new CintaVideo('Lo que el viento se llevó','C987','8.00',180);
$cintavideo2 = new CintaVideo('Los Otros','F113','10.00',120);
$cintavideo3 = new CintaVideo('Bichos','A227','7.00',91);

$duracion1 = $cintavideo1->getDuracion();
$duracion2 = $cintavideo2->getDuracion();
$duracion3 = $cintavideo3->getDuracion();


if($duracion1>$duracion2){
	if($duracion3>$duracion1){
	$imprime1 = $cintavideo3->imprime_caracteristicas();
	$imprime2 = $cintavideo1->imprime_caracteristicas();
	$imprime3 = $cintavideo2->imprime_caracteristicas();
	}
	if($duracion3<$duracion2){
	$imprime1 = $cintavideo1->imprime_caracteristicas();
	$imprime2 = $cintavideo2->imprime_caracteristicas();
	$imprime3 = $cintavideo3->imprime_caracteristicas();
	}
	if($duracion3<$duracion1 && $duracion3>$duracion2){
	$imprime1 = $cintavideo1->imprime_caracteristicas();
	$imprime2 = $cintavideo3->imprime_caracteristicas();
	$imprime3 = $cintavideo2->imprime_caracteristicas();
	}
}else{
	if($duracion3>$duracion2){
	$imprime1 = $cintavideo3->imprime_caracteristicas();
	$imprime2 = $cintavideo2->imprime_caracteristicas();
	$imprime3 = $cintavideo1->imprime_caracteristicas();
	}
	if($duracion3<$duracion1){
	$imprime1 = $cintavideo2->imprime_caracteristicas();
	$imprime2 = $cintavideo1->imprime_caracteristicas();
	$imprime3 = $cintavideo3->imprime_caracteristicas();
	}
	if($duracion3<$duracion2 && $duracion3>$duracion1){
	$imprime1 = $cintavideo2->imprime_caracteristicas();
	$imprime2 = $cintavideo3->imprime_caracteristicas();
	$imprime3 = $cintavideo1->imprime_caracteristicas();
	}
}






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
	min-height:250px;
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
	margin-top:20px;
	background:orange;
	color:#fff;
}
h1:first-child{
	margin-top:0;
}
h2{
	font-size:1em;
	font-weight:bold;
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
<?= $imprime1 ?>
<?= $imprime2 ?>
<?= $imprime3 ?>
</section>
</body>
</html>
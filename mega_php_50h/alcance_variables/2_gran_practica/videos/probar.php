<?php

include("Soporte.php");
include("CintaVideo.php");

//$soporte = new Soporte('Los Otros','F104',10);
//$imprimir = $soporte->imprime_caracteristcas();
//$imprime = $soporte->imprime_caracteristicas();

$cintavideo = new CintaVideo('Lo que el viento se llevó','C987','8.00','180');
$imprime = $cintavideo->imprime_caracteristicas();


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
<?= $imprime ?>
</section>
</body>
</html>
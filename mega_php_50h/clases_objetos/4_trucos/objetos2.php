<?php

require("clientes.php");

$dni;
$email;

//Creamos un nuevo objeto y mostrams los clientes

$cliente = new Clientes('12345678A','info@mail.com');

$dni = $cliente->getDNI();
$email = $cliente->getEmail();

$cliente->setDNI('99999999C');
$cliente->setEmail('info@mail.es');

$dni = $cliente->getDNI();
$email = $cliente->getEmail();

unset($cliente);

?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Clase de POO</title>
<style>
*{
	margin:0;
	padding:0;
}
body{
	background:lightgreen;
	font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
	font-size:1em;
}
section{
	width:300px;
	margin:100px auto;
	border:3px solid grey;
	padding:1.5em;
	box-sizing:border-box;
	background:#fff;
}
h2{
	font-size:1.1em;
	color:#000;
	font-weight:normal;
}
</style>
</head>

<body>
<section>
<h2>DNI: <?= $dni ?></h2>
<h2>Email: <a href="mailto:<?= $email ?>"><?= $email ?></a></h2>
</section>
</body>
</html>







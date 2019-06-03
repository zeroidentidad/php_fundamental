<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Plantilla</title>
	<link rel="stylesheet" type="text/css" href="views/css/estilo.css">
</head>
<body>

<header>
		<h1>LOGOTIPO</h1>
</header>

<?php 
	include "modules/navegacion.php";
?>

<section>

<?php

$mvc = new MvcController();
$mvc -> enlacesPaginasController();

?>
	
</section>

</body>
</html>
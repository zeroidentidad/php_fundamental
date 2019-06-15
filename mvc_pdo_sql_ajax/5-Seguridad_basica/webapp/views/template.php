<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Plantilla</title>
	<link rel="stylesheet" type="text/css" href="views/css/estilos.css?v=<?php echo rand(); ?>"> 
</head>

<body>

<?php include "modules/navegacion.php"; ?>

<section>
<?php 

$mvc = new MvcController();
$mvc->enlacesPaginasController();

 ?>
</section>
	
<script src="views/js/zeroUtil.js"></script>
<script src="views/js/validarRegistro.js"></script>

</body>

</html>
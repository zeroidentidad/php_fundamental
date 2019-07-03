<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Plantilla</title>
	<link rel="stylesheet" type="text/css" href="views/css/estilos.css?v=<?php echo rand(); ?>">
	<script type="application/javascript" src="views/js/jquery-3.0.0.min.js"></script>
</head>

<body>

<?php include "modules/navegacion.php"; ?>

<section>
<?php 

$mvc = new MvcController();
$mvc->enlacesPaginasController();

 ?>
</section>
	
<script type="application/javascript" src="views/js/zeroUtil.js?v=<?php echo rand(); ?>"></script>
<script type="application/javascript" src="views/js/validarRegistro.js?v=<?php echo rand(); ?>"></script>
<script type="application/javascript" src="views/js/validarIngreso.js?v=<?php echo rand(); ?>"></script>
<script type="application/javascript" src="views/js/validarCambio.js?v=<?php echo rand(); ?>"></script>

</body>

</html>
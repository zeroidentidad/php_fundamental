<?php 

	$producto = 'papa';
	
	$productos = array('papa','tomate','cebolla','maiz');
	
	$unidades = array(
		'papa' => 30,
		'tomate' => 20,
		'cebolla' => 25,
		'maiz' => 15
	);
	
	$precios = array(
		'papa' => 1.5,
		'tomate' => 2.0,
		'cebolla' => 1.8,
		'maiz' => 0.8
	);
	
	if(in_array($producto,$productos))
	{
		$precioTotal = $unidades[$producto]*$precios[$producto];
		$mensaje = 'El precio total de '.$unidades[$producto].' unidades de '.$producto." es igual a {$precioTotal} pesos";
		echo $mensaje;
	}
	else
	{
		// $producto = 'calabaza';
		echo 'Stock agotado.';
	}

?>
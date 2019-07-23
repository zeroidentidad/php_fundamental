<?php

//getdate() devuelve una tabla asociativa de la fecha y las horas actuales
print_r(getdate());

echo "<br/>";
echo "<br/>";

//la funcion checkdate() indica si una fecha es válida o no. Esta función interna de PHP tiene en cuenta los años bisiestos.
$valido = checkdate(12, 10, 2011);

if($valido == true){
	echo 'La fecha 10-12-2011 es valida';
}else{
	echo 'La fecha 10-12-2011 no es valida';
}

?>
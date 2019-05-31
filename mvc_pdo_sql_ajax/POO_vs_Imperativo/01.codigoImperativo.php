<?php

$automovil1 = (object)["marca"=>"Wolfvagen", "modelo"=>"Bochito"];
$automovil2 = (object)["marca"=>"Nissan", "modelo"=>"Suru"];


function mostrar($automovil){

	echo "<p>Hola! soy un $automovil->marca, modelo $automovil->modelo</p>";

}

mostrar($automovil1);
mostrar($automovil2);

?>
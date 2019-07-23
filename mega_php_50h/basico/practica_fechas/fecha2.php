<?php
//Necesitamos un script que nos muestre la fecha de hoy y la fecha de dentro de 7 días

$proximaSemana = time() + (7 * 24 * 60 * 60);
//time() devuelve la fecha actual en segundos
//tenemos que sumar los segundos de 7 días
//Los segundos de 7 días = 7 días * 24 horas * 60 minutos * 60 segundos

echo "La fecha de hoy es: ".date('d-m-Y')."<br/>";

echo "La fecha de la siguiente cuota es: ".date('d-m-Y',$proximaSemana);

?>
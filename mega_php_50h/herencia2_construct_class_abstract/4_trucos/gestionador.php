<?php

require("fecha.php");

$fecha = new Fecha(21,12,1956);
print $fecha->toString();
print 'Formato Inglés: ';
print $fecha->formatea();

print '<br/>';
print '<br/>';
print 'Me he equivocado de mes<br/>';
$fecha->setMes(11);
print $fecha->toString();
print '<br/>';
print 'Formato Inglés: ';
print $fecha->formatea();

print '<br/>';
print '<br/>';
print '<h1>Días entre dos fechas</h1>';

$fecha1 = new Fecha(16,10,1974);
print $fecha1->toString();
print '<br/>';

$fecha2 = new Fecha(25,11,1976);
print $fecha2->toString();
print '<br/>';

$fecha_ok1 = $fecha1->formatea();
$fecha_ok2 = $fecha2->formatea();

$dias = $fecha1->calculaFechas($fecha_ok1,$fecha_ok2);
print 'Tiempo transcurrido en '.$dias;

?>








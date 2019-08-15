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

?>
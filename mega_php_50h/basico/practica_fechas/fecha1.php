<?php
ini_set('default_charset', 'utf-8');
//La función timer() devuelve la hora actual desde el inicio de UNIX (1 de Enero de 1970 00:00:00 GMT). Esta hora tambiéns se llama TIMESTAMP UNIX
echo "TIEMPO EN FORMATO TIMESTAMP UNIX:<br/>";
echo time();
echo "<br/>";

//La función date() devuelve la fecha en el formato que se ha pasado como argumento
echo "FECHA EN EL FORMATO QUE DECIDAMOS: día - mes - año<br/>";
echo date('d.m.y');
echo "<br/>";


?>
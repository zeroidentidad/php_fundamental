<?php

function hacerAlgo()
{
    return "Hola mundo". chr(10);
}
echo hacerAlgo();

function decirHola($nombre) // basica
{
    return "¿Que tal $nombre?". chr(10);
}
echo decirHola("Jesus");


function decirHola2($nombre='') // con param con val por defecto
{
    return "Hola $nombre". chr(10);
}
echo decirHola2();

$x=1;
function incremento(&$x) // con param de referencia
{
    $x++;
}
incremento($x);
incremento($x);

echo $x. chr(10); // x2 veces al val inicial

function agregarTo(...$elementos) // con argumento de longitud de variable
{
    foreach($elementos as $elemento){
        echo "$elemento, ";
    }
}
echo agregarTo('cosa 1','cosa 2','cosa 3','cosa 4'). chr(10);

function anioPar($anio) // forma recursiva
{

    if ($anio%2===0) {
        echo "$anio: PAR, ";
    }

    if ($anio!=date('Y')) {
        anioPar($anio+1);
    }
}
anioPar(2000); echo chr(10);

?>
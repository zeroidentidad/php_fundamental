<?php
/*
    1. ​Crear una función en PHP que reciba "N parámetros" del tipo entero (...$parametros) y que retorne como respuesta el total de números impares encontrados
*/

function contarNumerosImpares(...$numeros){
    $n = 0;

    foreach($numeros as $numero) {
        if($numero % 2 !== 0) {
            $n++;
        }
    }

    return $n;
}

echo contarNumerosImpares(1,2,3,4,6,9);

/*
2. Crear un algoritmo que encuentre todas las vocales del abecedario a partir de la siguiente oración
"Hoy es un dia excelente para programar, me siento listo para poner en practica mis conocimientos en PHP 7".

Lo que se espera es retornar un array que como indices tendra todas las vocales, y como valor de cada
indice tendremos un array de enteros especificando en que posición se encontró dicha vocal.

Ejem:
[
    'a' => [4,10,14] // quiere decir que la "a" fue encontrada en la posición 4, 10, 14. Siendo su coincidencia 3 veces"
    'e' => [2, 25],
    ...
] 
*/

function buscarVocales(){
    $vocales   = ['a', 'e', 'i', 'o', 'u'];
    $resultado = [];
    $oracion   = 'Hoy es un dia excelente para programar, me siento listo para poner en practica mis conocimientos en PHP 7';

    for($i = 0; $i < strlen($oracion); $i++) {
        if(in_array($oracion[$i], $vocales)) {
            $resultado[$oracion[$i]][] = $i;
        }
    }

    return $resultado;
}

var_dump(buscarVocales());

/*
3. Se ha asignado crear un algoritmo para calcular el promedio del curso de PHP 7.
El curso esta compuesto de la siguiente manera:

Evaluación continua   => 20%
Examen Parcial        => 20%
Examen Final          => 40%
Práctica 1            => 10%
Práctica 2            => 10%

Reglas de evaluación:
La evaluación continua es el promedio de N notas (array), por lo tanto para este criterio se espera un array de enteros 

La formula estimada es la siguiente:
(PROMEDIO(E.C) * 0.2) + (E.P * 0.2) + (E.F * 0.4) + (P1 * 0.1) + (P2 * 0.1)

Consideraciones:
El mínimo de una nota es 0
El máximo de una nota es 20
Promedio >= 13: APROBADO
Promedio < 13: DESAPROBADO

Indicaciones:
* La función esperada deberá recibir un array con las notas, podemos usar como índices la abreviatura de los criterios de evaluacion
[
    'ec' => [15, 18, 17],
    'ep' => 10,
    'ef' => 16,
    'p1' => 17,
    'p2' => 04
]
* El algoritmo deberá retornar el promedio formateado con 2 decimales indicando si aprobo o desaprobo el curso
*/

function cursoPHP7($notas){
    $nota = (
        (array_sum($notas['ec']) / count($notas['ec']) * 0.2) +
         $notas['ep'] * 0.2 +
         $notas['ef'] * 0.4 +
         $notas['p1'] * 0.1 +
         $notas['p2'] * 0.1
    );

    return sprintf(
        "<b>%s</b> el curso de PHP 7 con <b>%s</b>",
        ($nota >= 13 ? 'Aprobo' : 'Desaprobo'),
        number_format($nota, 2)
    );
}

echo cursoPHP7([
    'ec' => [20, 20],
    'ep' => 20,
    'ef' => 12,
    'p1' => 10,
    'p2' => 10,
]); // Aprobo el curso de PHP 7 con 14.80
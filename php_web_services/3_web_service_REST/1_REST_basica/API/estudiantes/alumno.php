<?php
header("Content-Type: application/json");
function MostrarAlumnos()
{
    $alumno = array(
        [
            "nombre" => "Jesus",
            "apellido" => "Ferrer",
            "curso" => "PHP REST",
            "usuario" => "Zero"
        ],
        [
            "nombre" => "Jesus2",
            "apellido" => "Ferrer2",
            "curso" => "PHP REST2",
            "usuario" => "Zero2"
        ]
    );
    return $alumno;
}
echo json_encode(MostrarAlumnos());

?>
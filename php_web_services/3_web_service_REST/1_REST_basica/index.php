<?php
$url = "http://localhost:8080/API/estudiantes/alumno.php";
$JSON = file_get_contents($url);
$datos = json_decode($JSON);
//print_r($JSON);
foreach ($datos as $dato) {
    echo "<br>Nombre: " . $dato->nombre . " " . $dato->apellido . "<br>";
    echo "Curso: " . $dato->curso . "<br>";
    echo "usuario: " . $dato->usuario . "<br>";
}
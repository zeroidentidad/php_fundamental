<?php
header("Content-Type: application/json");

function mostrarCursos()
{
    $cursos = array("React", "Vue", "PHP", "Go", "React Native");
    return $cursos;
}

function mostrarAlumnos()
{
    $alumnos = array("Jesus", "Ana", "Pedro", "Maria", "Carlos");
    return $alumnos;
}

if ($_GET["solicitud"] == "cursos") {

    $resultado = mostrarCursos();
} else if ($_GET["solicitud"] == "lista") {

    $resultado = mostrarAlumnos();
} else {
    header("http/1.1 405 Method Not Allowed");
    exit;
}

echo json_encode($resultado);
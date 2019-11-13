<?php

$CursosURL= "http://localhost:8080/php_web_services/3_web_service_REST/2_REST_conf_rutas/API/estudiantes/cursos";
$AlumnosURL= "http://localhost:8080/php_web_services/3_web_service_REST/2_REST_conf_rutas/API/estudiantes/lista";

$CursosJSON=file_get_contents($CursosURL);
$AlumnosJSON=file_get_contents($AlumnosURL);

$cursos= json_decode($CursosJSON);
$alumnos= json_decode($AlumnosJSON);

echo "<h2>Alumnos</h2>";
	echo"<ul>";
	foreach($alumnos as $alumno){
		echo"<li>".$alumno."</li>";
	}
    echo"</ul>";
    
echo "<h2>Cursos</h2>";
	foreach($cursos as $curso){
		echo"->".$curso."<br>";
    }
    
?>
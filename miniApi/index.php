<?php

$titulosURL = 'http://localhost:8080/miniApi/API/biblioteca/titulo/lista';
$autoresURL = 'http://localhost:8080/miniApi/API/biblioteca/autor/lista';

$titulosJson = file_get_contents($titulosURL);
$autoresJson = file_get_contents($autoresURL);
$titulos = json_decode($titulosJson);
$autores = json_decode($autoresJson);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <form class="control" action="API/biblioteca/autor/nuevo" method="post">
        <h1> Agregar</h1>
        <label>Autor</label>
        <input type="text" name="autor">
        <label>Titulo</label>
        <input type="text" name="titulo">
        <input type="submit" value="enviar">
    </form>

<?php
    echo 'Autores ' . count($autores);
    echo '<ul>';
    foreach ($autores as $autor) {
        echo '<li>' . $autor->autor . '</li>';
    }
    echo '</ul>';

    echo 'Libros ' . count($titulos);
    echo '<ul>';
    foreach ($titulos as $titulo) {
        echo '<li>' . $titulo->titulo . '</li>';
    }
    echo '</ul>';
?>
</div>    
</body>

</html>
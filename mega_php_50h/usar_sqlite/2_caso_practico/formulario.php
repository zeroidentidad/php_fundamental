<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulario</title>
<link rel="stylesheet" type="text/css" href="./estilo.css" /> 
</head>

<body>
<h1>Dar de Alta</h1>
<section>
	<form action="procesar.php" method="post">
    <label for="id">ID</label>
    <input type="text" name="id" id="id"/>
    <label for="nombre">Nombre</label>
    <input type="text" name="nombre" id="nombre"/>
    <label for="edad">Edad</label>
    <input type="text" name="edad" id="edad"/>
    <label for="curso">Curso</label>
    <input type="text" name="curso" id="curso"/>
    <label for="nota">Nota</label>
    <input type="text" name="nota" id="nota"/>
    <input type="submit" value="Enviar"/>
    </form>
</section>
</body>
</html>
<?php
function condb()
{
    // ya sea mysqli o pdo
    try {
        $cadena = 'mysql:host=localhost;dbname=blog';
        $conexion = new PDO($cadena, 'root', 'passx');

        return $conexion;
    } catch (PDOException $e) {
        echo "Error: ".$e->getMessage();
    }
}
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Creación de sitemaps para blog</title>
</head>

<body>
	<h1>Sitemaps</h1>
	<h2>Generando un archivo .xml para sitemap</h2>
<?php
	$ssql="SELECT * FROM posts";

	//Crear la cabecera del .xml
	$xml = '<?xml version="1.0" encoding="UTF-8"?>
	<urlset xmlns="http://www.google.com/schemas/sitemap/0.84">';

	$rs = condb()->prepare($ssql);
	$rs->execute();
	while ($fila=$rs->fetchAll()) {
		$xml .= '
		<url>
			<titulo>'.$fila->titulo.'</titulo>
			<loc>'.$fila->url.'</loc>
			<autor>'.$fila->autor.'</autor>
			<lastmode>'.$fila->fecha.'</lastmode>
			<changefreq>monthly</changefreq>
			<priority>0.8</priority>
		</url>';
	}
	$xml .= '</urlset>';

	$path = $_SERVER['DOCUMENT_ROOT'].'/url/feed/sitemap.xml';
	$modo = 'w+';

	if ($fp = fopen($path, $modo)) {
		fwrite($fp, $xml);
		echo '<p>El archivo sitemap se ha creado <strong>correctamente</strong></p>';
	} else {
		echo '<p>Ha ocurrio <strong>un error</strong> al crear sitemap</p>';
	}

	$rs->close();
?>
</body>

</html>
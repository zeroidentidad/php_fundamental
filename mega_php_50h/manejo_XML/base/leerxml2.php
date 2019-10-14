<?php
$url = 'peliculas.xml';
$peliculas = simplexml_load_file($url);
?>

<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<title>Ejemplo XML</title>
	<style>
		* {
			margin: 0;
			padding: 0;
		}

		body {
			font-family: Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
			background: rgba(165, 240, 228, 1.00);
		}

		section {
			width: 60%;
			margin: 3% auto;
			padding: 2%;
			text-align: center;
			box-sizing: border-box;
			background: #fff;
		}
	</style>
</head>

<body>
	<section>
		<?php
		foreach ($peliculas->xpath('//personaje') as $personaje) {
			echo $personaje->nombre . ' interpretado por ' . $personaje->actor . '<br/>', PHP_EOL;
		}
		?>
	</section>
</body>

</html>
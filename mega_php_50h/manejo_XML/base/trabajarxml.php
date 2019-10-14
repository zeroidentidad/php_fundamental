<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Trabajar XML</title>
<style>
*{
	margin:0;
	padding:0;
}
body{
	font-family:Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
}
section{
	width:600px;
	margin:0 auto;
	background:rgba(217,217,217,1.00);
}
h2{
	background:brown;
	color:#fff;
	padding:0.5em 0;
	text-align:center;
	font-size:1.3em;
	font-weight:lighter;
}
h2 span{
	font-weight:normal;
}
</style>
</head>

<body>
<section>
<?php
	if(!$xml = simplexml_load_file('usuarios.xml')){
		echo 'No se ha podido cargar el XML';
	}else{
		foreach ($xml as $usuario){
			echo '<h2>Nombre: <span> '.$usuario->nombre. ' ' . $usuario->apellidos . '</span></h2>';
			echo 'Dirección: '.$usuario->direccion.'<br/>';
			echo 'Ciudad: '.$usuario->ciudad. ' - País: '.$usuario->pais. '<br/>';
			echo 'Teléfono: <a href=tel:"'.$usuario->contacto->telefono.'">'.$usuario->contacto->telefono.'</a><br/>';
			echo 'Email: <a href="mailto:'.$usuario->contacto->email.'" target="blank">'.$usuario->contacto->email.'</a> - URL: <a href="'.$usuario->contacto->url.'">'.$usuario->contacto->url.'</a><br/>';
			echo '-------------------<br/>';
		}
	}
?>
</section>
</body>
</html>
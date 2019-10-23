<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Formulario Alumnos</title>
<link rel="stylesheet" type="text/css" href="./estilo.css" /> 
</head>

<body>
<h1>Lista de Alumnos</h1>
<section>
<?php

class MyDB extends SQLite3
{
	function __construct()
	{
		$this->open('alumnos.db');
	}
}

$db = new MyDB();
if(!$db){
	echo $db->lastErrorMsg();
}else{

}

$sql =<<<EOF
      SELECT * from ALUMNOS;
EOF;

$ret = $db->query($sql);
while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	echo "<article>";
	echo "ID = ".$row['ID']."<br/>";
	echo "NOMBRE = ".$row['NOMBRE']."<br/>";
	echo "EDAD = ".$row['EDAD']."<br/>";
	echo "CURSO = ".$row['CURSO']."<br/>";
	echo "NOTA = ".$row['NOTA']."<br/>";
	echo "</article>";
}

$db->close();

?>
</section>
</body>
</html>
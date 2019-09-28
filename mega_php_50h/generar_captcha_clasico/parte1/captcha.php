<?php
session_start();
$_SESSION['count']=time();
$image;
?>

<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Captcha</title>
<link rel="stylesheet" type="text/css" href="./estilo.css">
</head>
<body>

<?php
$flag = 5;
if(isset($_POST['flag'])){
	$input = $_POST['input'];
	$flag = $_POST['flag'];
}

function create_image(){
	//ccntinuar parte 2
}
?>

<section>
	<h1>Ingresa el texto de la imagen</h1>
    <p>Para verificar que no eres un robot</p>
    <div>
    = Aquí irá el captcha =
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    	<input type="text" name="input"/>
        <input type="hidden" name="flag" value="1"/>
        <input type="submit" value="Enviar" name="submit"/>
    </form>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="submit" value="Refrescar página"/>
    </form>
</section>
</body>
</html>
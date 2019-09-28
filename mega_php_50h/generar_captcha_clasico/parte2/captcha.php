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
$resultado = '';
if(isset($_POST['flag'])){
	$input = $_POST['input'];
	$flag = $_POST['flag'];
}

if($flag == 1){
	if($input == $_SESSION['captcha_string']){
		$resultado = "Correcto";
	}else{
		$resultado = "Incorrecto";
		create_image();
	}
}else{
	create_image();
}

function create_image(){
	global $image;
	$image = imagecreatetruecolor(250,50) or die('No pudo invocar la librería GD');
	$background_color = imagecolorallocate($image, 255,255,255);
	$text_color = imagecolorallocate($image, 0, 255, 255);
	$line_color = imagecolorallocate($image, 64, 64, 64);
	$pixel_color = imagecolorallocate($image, 0, 0, 255);
	
	imagefilledrectangle($image, 0, 0, 250, 50, $background_color);
	
	for ($i=0; $i<3; $i++){
		imageline($image, 0, rand() %50, 300, rand() % 50, $line_color);
	}
	
	for ($i=0; $i<1000; $i++){
		imagesetpixel($image, rand() %250, rand() % 50, $pixel_color);
	}
	
	$letters='ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz';
	$len = strlen($letters);
	$letter = $letters[rand(0, $len - 1)];
	
	$text_color = imagecolorallocate($image, 0, 0, 0);
	$word = '';
	
	for($i = 0; $i < 6; $i++){
		$letter = $letters[rand(0, $len-1)];
		imagestring($image,7,5 + ($i * 30), 20, $letter, $text_color);
		$word .= $letter;
	}
	
	$_SESSION['captcha_string'] = $word;
	
	$images = glob("*.png");
	foreach ($images as $image_to_delete){
		@unlink($image_to_delete);
	}
	
	imagepng($image,"image".$_SESSION['count'].".png");
}
?>

<section>
	<h1>Ingresa el texto de la imagen</h1>
    <p>Para verificar que no eres un robot</p>
    <div>
    <img src="image<?php echo $_SESSION['count']; ?>.png"/>
    </div>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    	<input type="text" name="input"/>
        <input type="hidden" name="flag" value="1"/>
        <input type="submit" value="Enviar" name="submit"/>
    </form>

    <span><?= $resultado ?></span>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <input type="submit" value="Refrescar página"/>
    </form>
</section>
</body>
</html>
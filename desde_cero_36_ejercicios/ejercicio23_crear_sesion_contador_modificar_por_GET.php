<?php 

// uso de sesion que aumente o disminuya su valor dependiendo si recibe por GET un 1 o un 0

session_start();

if(!isset($_SESSION["numero"])){
	$_SESSION["numero"]=0;
}

if(isset($_GET["contador"])&&$_GET["contador"]==1){
	$_SESSION["numero"]++;
}
elseif(isset($_GET["contador"])&&$_GET["contador"]==0){
	$_SESSION["numero"]--;
}

echo "Valor sesion: ".$_SESSION["numero"];

 ?>
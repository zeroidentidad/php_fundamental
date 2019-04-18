<?php 

// mostrar numeros multiplos de un numero entre 1 y 100

for ($i=1; $i <= 100 ; $i++) { 
	if (isset($_GET["num"])&&($i%$_GET["num"]==0)) {
		print " ".($i)." es multiplo de ".$_GET["num"]."<br/>";
	}
}

 ?>
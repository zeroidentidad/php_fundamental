<?php

class Aleatorio{
	
	public $valor;
	
	function __construct(){
		$this->valor = rand();
	}
	
	public function generar($start=0,$end=null){
		if($end==null){
			$end = getrandmax();
		}
		
		$this->valor = rand($start,$end);
	}
}

//Usar la clase Aleatorio

$miRandom = new Aleatorio();

for($i=0;$i<10;$i++){
	$miRandom->generar($i,$i*10);
	echo $miRandom->valor.'<br/>';
}

?>








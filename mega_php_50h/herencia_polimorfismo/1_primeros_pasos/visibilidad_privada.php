<?php

class Aleatorio{
	
	private $valor;
	
	function __construct(){
		$this->valor = rand();
	}
	
	private function generar($start=0,$end=null){
		if($end==null){
			$end = getrandmax();
		}
		
		$this->valor = rand($start,$end);
	}
	
	public function getNumero($min=0,$max=null){
		$this->generar($min,$max);
		return $this->valor;
	}
}

//Usar la clase Aleatorio

$miRandom = new Aleatorio();

for($i=0;$i<10;$i++){
	echo $miRandom->getNumero($i,$i*10).'<br/>';
}

?>
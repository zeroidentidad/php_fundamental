<?php 

//clase Padre o Madre
class Figura {
	
	protected $base;
	protected $altura;
	
	function __construct($base_ext,$altura_ext){
		$this->base = $base_ext;
		$this->altura = $altura_ext;
	}
	
	public function getBase(){
		return $this->base;
	}
	
	public function getAltura(){
		return $this->altura;
	}	
	
}

//clase heredera: Rectangulo
class Rectangulo extends Figura {
	
	public function area(){
		return $this->base * $this->altura;
	}
}

//clase heredera: Triángulo
class Triangulo extends Figura {
	
	public function area(){
		return $this->base * $this->altura / 2;
	}
	
}


$rectangulo = new Rectangulo(15,35);

echo ('Altura del Rectángulo = '.$rectangulo->getAltura().' cm');
echo ('<br/>');
echo ('Base del Rectángulo = '.$rectangulo->getBase().' cm');
echo ('<br/>');
echo ('Área del Rectángulo = '.$rectangulo->area().' cm2');
echo ('<br/>');



?>








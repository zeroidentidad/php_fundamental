<?php 

//clase Padre:
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

//clase heredera: Cuadrado
class Cuadrado extends Figura {
	
	public function area(){
		return $this->base * $this->altura;
	}
}

//clase heredera: Trapecio
class Trapecio extends Figura{
	
	protected $base2;
	
	function __construct($base_ext,$altura_ext,$base2_ext)
	{
		$this->base = $base_ext;
		$this->altura = $altura_ext;
		$this->base2 = $base2_ext;
	}
	
	function area(){
		return (($this->base + $this->base2) / 2) * $this->altura; 
	}
	
	public function getBase2(){
		return $this->base2;
	}
	
}

$rectangulo = new Rectangulo(15,35);

echo ('<h2>Rectángulo</h2>');
echo ('<br/>');
echo ('Altura del Rectángulo = '.$rectangulo->getAltura().' cm');
echo ('<br/>');
echo ('Base del Rectángulo = '.$rectangulo->getBase().' cm');
echo ('<br/>');
echo ('Área del Rectángulo = '.$rectangulo->area().' cm2');
echo ('<br/>');
echo ('<br/>');

$triangulo = new Triangulo(5,3);

echo ('<h2>Triángulo</h2>');
echo ('<br/>');
echo ('Altura del Triángulo = '.$triangulo->getAltura().' cm');
echo ('<br/>');
echo ('Base del Triángulo = '.$triangulo->getBase().' cm');
echo ('<br/>');
echo ('Área del Triángulo = '.$triangulo->area().' cm2');
echo ('<br/>');
echo ('<br/>');

$cuadrado = new Cuadrado(20,20);

echo ('<h2>Cuadrado</h2>');
echo ('<br/>');
echo ('Altura del Cuadrado = '.$cuadrado->getAltura().' cm');
echo ('<br/>');
echo ('Base del Cuadrado = '.$cuadrado->getBase().' cm');
echo ('<br/>');
echo ('Área del Cuadrado = '.$cuadrado->area().' cm2');
echo ('<br/>');
echo ('<br/>');

$trapecio = new Trapecio(6,3,4);

echo ('<h2>Trapecio</h2>');
echo ('<br/>');
echo ('Altura del Trapecio = '.$trapecio->getAltura().' cm');
echo ('<br/>');
echo ('Base Inferior del Trapecio = '.$trapecio->getBase().' cm');
echo ('<br/>');
echo ('Base superior del Trapecio = '.$trapecio->getBase2().' cm');
echo ('<br/>');
echo ('Área del Trapecio = '.$trapecio->area().' cm2');
echo ('<br/>');
echo ('<br/>');

?>








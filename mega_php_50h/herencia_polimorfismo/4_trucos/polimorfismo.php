<?php 

//clase Padre:
class Figura {
	
	protected $base;
	protected $altura;
	
	function __construct($base_ext,$altura_ext){
		$this->base = $base_ext;
		$this->altura = $altura_ext;
	}
	
	public function area(){
		$resultado = 'El área depende del tipo de valor';
		return $resultado;
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
		$area = $this->base * $this->altura;
		$resultado = '<h2>Rectángulo</h2>';
		$resultado .= '<br/>';
		$resultado .= 'Altura del Rectángulo = '.$this->getAltura().'cm';
		$resultado .= '<br/>';
		$resultado .= 'Base del Rectángulo = '.$this->getBase().'cm';
        $resultado .= '<br/>';
		$resultado .= 'Área del Rectángulo = '.$area.'cm2';
		$resultado .= '<br/>';
		$resultado .= '<br/>';
		return $resultado;
	}
}

//clase heredera: Triángulo
class Triangulo extends Figura {
	
	public function area(){
		$area = $this->base * $this->altura / 2;
		$resultado = '<h2>Triángulo</h2>';
		$resultado .= '<br/>';
		$resultado .= 'Altura del Triángulo = '.$this->getAltura().'cm';
		$resultado .= '<br/>';
		$resultado .= 'Base del Triángulo = '.$this->getBase().'cm';
        $resultado .= '<br/>';
		$resultado .= 'Área del Triángulo = '.$area.'cm2';
		$resultado .= '<br/>';
		$resultado .= '<br/>';
		return $resultado;
	}
	
}

//clase heredera: Cuadrado
class Cuadrado extends Figura {
	
	public function area(){
		$area = $this->base * $this->altura;
		$resultado = '<h2>Cuadrado</h2>';
		$resultado .= '<br/>';
		$resultado .= 'Altura del Cuadrado = '.$this->getAltura().'cm';
		$resultado .= '<br/>';
		$resultado .= 'Base del Cuadrado = '.$this->getBase().'cm';
        $resultado .= '<br/>';
		$resultado .= 'Área del Cuadrado = '.$area.'cm2';
		$resultado .= '<br/>';
		$resultado .= '<br/>';
		return $resultado;
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
		$area =  (($this->base + $this->base2) / 2) * $this->altura; 
		$resultado = '<h2>Trapecio</h2>';
		$resultado .= '<br/>';
		$resultado .= 'Altura del Trapecio = '.$this->getAltura().'cm';
		$resultado .= '<br/>';
		$resultado .= 'Base Inferior del Trapecio = '.$this->getBase().'cm';
        $resultado .= '<br/>';
		$resultado .= 'Base Superior del Trapecio = '.$this->getBase2().'cm';
        $resultado .= '<br/>';
		$resultado .= 'Área del Trapecio = '.$area.'cm2';
		$resultado .= '<br/>';
		$resultado .= '<br/>';
		return $resultado;
	}
	
	public function getBase2(){
		return $this->base2;
	}
	
}

function calculaArea(Figura $objeto){
	print $objeto->area();
}


$rectangulo = new Rectangulo(15,35);

$triangulo = new Triangulo(5,3);

$cuadrado = new Cuadrado(20,20);

$trapecio = new Trapecio(6,3,4);


calculaArea($rectangulo);
calculaArea($triangulo);
calculaArea($cuadrado);
calculaArea($trapecio);




?>








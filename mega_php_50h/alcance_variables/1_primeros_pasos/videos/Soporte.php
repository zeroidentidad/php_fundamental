<?php

class Soporte
{
	
	public $titulo;
	protected $numero;
	private $precio;
	
	function __construct($titulo_ext,$numero_ext,$precio_ext){
		$this->titulo = $titulo_ext;
		$this->numero = $numero_ext;
		$this->precio = $precio_ext;
	}
	
	public function dame_precio_sin_iva(){
		return $this->precio;
	}
	
	public function dame_precio_con_iva(){
		return $this->precio * 1.16;
	}
	
	public function dame_numero_identificacion(){
		return $this->numero;
	}
	
	public function imprime_caracteristcas(){
		print $this->titulo;
		print '<br/>'.$this->precio.'$, I.V.A. no incluido.';
	}
	
	
	
}

?>







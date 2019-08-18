<?php

class CintaVideo extends Soporte
{
	private $duracion;
	
	function __construct($titulo_ext,$numero_ext,$precio_ext,$duracion_ext){
		parent::__construct($titulo_ext,$numero_ext,$precio_ext);
		$this->duracion = $duracion_ext;
	}
	
	public function imprime_caracteristicas(){
		$resultado = parent::imprime_caracteristicas();
		$resultado .= '<p>------------</p>';
		$resultado .= '<h2>Película en VHS</h2>';
		$resultado .= '<p>Duración: '.$this->duracion.'min.</p>';
		return $resultado;
	}
	
	public function getDuracion(){
		return $this->duracion;
	}
	
}

?>
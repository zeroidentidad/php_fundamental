<?php 

class Fecha {
	
	private $dia;
	private $mes;
	private $anio;
	
	//Función constructor
	function __construct($dia_ext,$mes_ext,$anio_ext){
		$this->dia = $dia_ext;
		$this->mes = $mes_ext;
		$this->anio = $anio_ext;
	}
	
	//GETTER Y SETTER
	public function setDia($dia_ext){
		$this->dia = $dia_ext;
	}
	
	public function getDia(){
		return $this->dia;
	}
	
	public function setMes($mes_ext){
		$this->mes = $mes_ext;
	}
	
	public function getMes(){
		return $this->mes;
	}
	
	public function setAnio($anio_ext){
		$this->anio = $anio_ext;
	}
	
	public function getAnio(){
		return $this->anio;
	}
	
	//Mostrar el objeto como un String
	public function toString(){
	$resultado = $this->dia.'-';
	$resultado .= $this->mes.'-';
	$resultado .= $this->anio;
	$resultado .= '<br/>';
	return $resultado;
	}
	
	//Transformamos el formato de la fecha al inglés
	public function formatea(){
		$fecha_inglesa = $this->anio;
		$fecha_inglesa .= '-';
		$fecha_inglesa .= $this->mes;
		$fecha_inglesa .= '-';
		$fecha_inglesa .= $this->dia;
		return $fecha_inglesa;
	}
	
}

?>








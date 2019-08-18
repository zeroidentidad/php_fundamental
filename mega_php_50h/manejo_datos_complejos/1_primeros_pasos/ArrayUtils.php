<?php 

class ArrayUtils
{
	
	private $arr;
	private $orden;
	
	//Constructor
	public function __construct($arr){
		$this->arr = $arr;
	}
	
	//Mostramos el array
	public function verArray(){
		return $this->arr;
	}

	//Agregamos un elemento
	public function agregarElemento($valor,$indice=false){
		if(!$indice){
			$this->arr[] = $valor;
		}else{
			if(is_int($indice)){
				$this->arr[(int)$indice] = $valor;
			}else{
				$this->arr[(string)$indice] = $valor;
			}
		}
	}
	
	//Eliminar un elemento
	public function eliminarElemento($indice=false){
		if(is_int(!$indice)){
			if(isset($this->arr[(int)$indice])){
				unset($this->arr[(int)$indice]);
				return true;
			}else{
				return false;
			}
		}else{
			if(isset($this->arr[(string)$indice])){
				unset($this->arr[(string)$indice]);
				return true;
			}else{
				return false;
			}
		}
	}
	
}


?>
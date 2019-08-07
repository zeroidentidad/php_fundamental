<?php

class Vehiculo {
	
	var $color;
	var $numero_puertas;
	var $marca;
	var $gasolina = 0;
	
	function llenarDeposito($gasolina_nueva){
		$this->gasolina = $this->gasolina + $gasolina_nueva;
		return 'Depósito lleno: '.$this->gasolina;
	}
	
	function acelerar(){
		if($this->gasolina > 0){
			$this->gasolina = $this->gasolina -1;
			return 'Gasolina restante: '.$this->gasolina;
		}
	}
	
}

//declaramos un objeto Vehiculo
$vehiculo = new Vehiculo();
$vehiculo->color = 'Rojo';
$vehiculo->marca = 'Peugeot';
$vehiculo->numero_puertas = 4;

//accedemos al método llenarDeposito y le pasamos la gasolina que queramos
print_r($vehiculo->llenarDeposito(10).'<br/>');

//accedemos a acelerar()
print_r($vehiculo->acelerar().'<br/>');
print_r($vehiculo->acelerar().'<br/>');
print_r($vehiculo->acelerar().'<br/>');

?>







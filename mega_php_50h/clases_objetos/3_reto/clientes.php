<?php

class Clientes {
	
	private $dni;
	private $email;
	
	//Constructor de la Clase
	//Si el servidor con está en modo E_STRICT nos podría dar un error al utilizar los dos constructores. Para evitarlo pondríamos esta línea al principio del script: error_reporting(0);
	function Clientes($dni_externo,$email_externo){
		$this->dni = $dni_externo;
		$this->email = $email_externo;
	}
	
	//Constructor para PHP6
	function _construct($dni_externo,$email_externo){
		$this->dni = $dni_externo;
		$this->email = $email_externo;
	}
	
	public function getDNI(){
		return $this->dni;
	}
	
	public function setDNI($dni_externo){
		$this->dni = $dni_externo;
	}
	
	public function getEmail(){
		return $this->email;
	}
	
	public function setEmail($email_externo){
		$this->email = $email_externo;
	}
	
}

?>







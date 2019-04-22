<?php 
	session_start();
	
	function verificar_sesion()
	{
		if(!isset($_SESSION["usuario_id"]))
		{
			header("Location: login.php");
			exit();		}	
	}

?>
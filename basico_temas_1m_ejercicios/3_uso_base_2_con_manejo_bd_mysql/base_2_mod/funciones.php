<?php
	/**
	* Devolver un valor booleano, 'verdadero' si el formulario contiene
	* valores permitidos, 'falso' en caso contrario
	*
	*/
	function valoresPermitidos()
	{
		$error = false;		
		for( $i = 0 ; $i < 6 ; $i++ )
		{
			if(!isset($_POST['numero_'.$i]) || empty($_POST['numero_'.$i]) || $_POST['numero_'.$i] < 1 || $_POST['numero_'.$i] > 20)
			{
				$error = true;
			}
		}
		return !$error;
	}
	
	/**
	* Devuelve una matriz no-asociativa (de índices) con 
	* los números elegidos por el usuario mediante formulario
	*/
	function obtenerNumerosElegidos()
	{
		$numeros = array();
		for( $i = 0 ; $i < 6 ; $i++ )
		{
			$numeros[$i] = $_POST['numero_'.$i];
		}
		return $numeros;
	}

	/*
	* Devuelve una matriz de números aleatorios.
	*
	*/
	function obtenerNumerosAleatorios()
	{
		$numeros = array();
		for( $i = 0 ; $i < 6 ; $i++ )
		{			
			do{
				$aleatorio = rand(1,20);
			}while(in_array($aleatorio,$numeros)); // evitar que los num aleatorios se repitan			
			$numeros[$i] = $aleatorio;
		}
		return $numeros;
	}
	
	/**
	* Devuelve el número de coincidencias entre 2 
	* matrices.
	*
	*/
	function obtenerNumeroCoincidencias($matriz1,$matriz2)
	{
		$cont = 0;
		for( $i = 0 ; $i < 6 ; $i++ )
		{
			if(in_array($matriz1[$i],$matriz2))
			{
				$cont++;
			}
		}
		return $cont;
	}

	/**
	* Devuelve el número de repeticiones para el número de coincidencias almacenadas 
	* de en el rango de 0 a 6.
	*
	*/
	function obtenerRepeticionCoincidencias($numCoincidencias, $db)
	{
		$consulta = "SELECT COUNT(*) as num FROM juegos WHERE coincidencias = {$numCoincidencias}";
		$resultado = mysqli_query($db, $consulta);
		$num_coincidencia = mysqli_fetch_assoc($resultado);

		return $num_coincidencia["num"];
	}

?>
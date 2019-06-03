<?php

#Funciones sin parámetros

function saludo(){

	echo "hola<br>";

}

saludo();

#Funciones con parámetros

function despedida($adios){

	echo $adios."<br>";

}

despedida("adios");

#Funciones con retorno

function retorno($retornar){

	return $retornar;

}

echo retorno("retornar");


?>
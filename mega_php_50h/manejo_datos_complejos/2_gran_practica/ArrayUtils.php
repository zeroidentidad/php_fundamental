<?php

class ArrayUtils
{
    private $arr;
    private $orden;
    
    //Constructor
    public function __construct($arr)
    {
        $this->arr = $arr;
    }
    
    //Mostrar el array
    public function verArray()
    {
        return $this->arr;
    }

    //Agregar un elemento
    public function agregarElemento($valor, $indice=false)
    {
        if (!$indice) {
            $this->arr[] = $valor;
        } else {
            if (is_int($indice)) {
                $this->arr[(int)$indice] = $valor;
            } else {
                $this->arr[(string)$indice] = $valor;
            }
        }
    }
    
    //Eliminar un elemento
    public function eliminarElemento($indice=false)
    {
        if (is_int(!$indice)) {
            if (isset($this->arr[(int)$indice])) {
                unset($this->arr[(int)$indice]);
                return true;
            } else {
                return false;
            }
        } else {
            if (isset($this->arr[(string)$indice])) {
                unset($this->arr[(string)$indice]);
                return true;
            } else {
                return false;
            }
        }
    }
    
    //Asignar el tipo de orden
    public function setOrden($indice='', $direccion='ASC')
    {
        $this->orden['indice'] = $indice;
        $this->orden['direccion'] = $direccion;
    }
    
    //Calcular media de un array
    public function calcularMediaArray()
    {
        $total = 0;
        for ($i=0; $i<=count($this->arr)-1; $i++) {
            $total += $this->arr[$i];
        }
        $promedio = $total / count($this->arr);
        return $promedio;
    }
    
    //Calcular el valor mayor
    public function calcularMaximoArray()
    {
        $paso = 0;
        $maximo = 0;
        while ($paso <= count($this->arr)-1) {
            if ($paso == 0) {
                $maximo = $this->arr[0];
            } else {
                if ($this->arr[$paso] > $maximo) {
                    $maximo = $this->arr[$paso];
                }
            }
            $paso++;
        }
        
        return $maximo;
    }
    
    //Elegir elementos que empiezan por letra especifica
    public function mostrarArrayLetra()
    {
        $nombres_elegidos = array();
        $r = 0;
        foreach ($this->arr as $nombre) {
            if ($nombre[0] == 'J') {
                $nombres_elegidos[$r] = $nombre;
                $r++;
            }
        }
        foreach ($nombres_elegidos as $clave=>$valor) {
            echo $valor;
            if (count($nombres_elegidos)-1 != $clave) {
                echo ', ';
            } else {
                echo '.';
            }
        }
    }
}

<?php

class MySQL
{
    private $hostname;
    private $usuario;
    private $password;
    private $base;
    private $conexion;
    public $error;
    
    public $useCache = false;
    
    public $mcHost = 'localhost';
    public $mcPuerto = '11211';
    public $mcTiempo = '3600';
    
    public function __construct($hostname, $usuario, $password, $base)
    {
        $this->hostname = $hostname;
        $this->usuario = $usuario;
        $this->password = $password;
        $this->base = $base;
        
        if (!$this->_connect()) {
            $this->error = mysql_error();
        }
    }
    
    private function _connect()
    {
        $this->conexion = mysql_connect($this->hostname, $this->usuario, $this->password);
        if ($this->conexion) {
            mysql_select_db(
                $this->base,
                $this->conexion
            );
        } else {
            $this->error = mysql_error();
            return false;
        }
    }
    
    public function filtrar($valor)
    {
        $valor = stripslashes($valor);
        $valor = ltrim($valor);
        $valor = rtrim($valor);
        return mysql_real_escape_string($valor);
    }
    
    public function enviarQuery($query)
    {
        $tipo = strtoupper(substr($query, 0, 6));
        switch ($tipo) {
            
            case 'SELECT':
            
            if ($this->useCache) {
                //Usamos la cache
                $memcache = new Memcache();
                $memcache->connect($this->mcHost, $this->mcPuerto);

                //Definimos la clave para almacen el resultado
                $clave = md5($query);
                
                //Verificamos si está en la memoria
                $resultado = $memcache->get($clave);
                
                if (empty($resultado)) {
                    //No está en la cache, hay que ir a la base de datos
        
                    $resultado = mysql_query($query, $this->conexion);
                    if (!$resultado) {
                        $this->error = mysql_error();
                    } else {
                        if (mysql_num_rows($resultado) == 0) {
                            return false;
                        } else {
                            while ($f = mysql_fetch_assoc($resultado)) {
                                $r[] = $f;
                            }
                            mysql_free_result($resultado);
                        }
                        echo "No estaba en memoria, viene de la base de datos";
                        $memcache->set($clave, $r, false, $this->mcTiempo);
                        return $r;
                    }
                } else {
                    echo "Viene de la memoria cache";
                    return $resultado;
                }
            } else {
                //No usamos cache
                $resultado = mysql_query($query, $this->conexion);
                if (mysql_num_rows($resultado) == 0) {
                    return false;
                } else {
                    while ($f = mysql_fetch_assoc($resultado)) {
                        $r[] = $f;
                    }
                    mysql_free_result($resultado);
                }
                return $r;
            }
            break;
            
            case 'INSERT':
            $resultado = mysql_query($query, $this->conexion);
            if (!$resultado) {
                $this->error = mysql_error();
            } else {
                return mysql_insert_id();
            }
            break;
            
            case 'DELETE':
                case 'UPDATE':
                $resultado = mysql_query($query, $this->conexion);
                if (!$resultado) {
                    $this->error = mysql_error();
                } else {
                    return mysql_affected_rows();
                }
                break;
                
            default:
            $this->error = "Tipo de consulta no permitida";
        }//end switch
    }
    
    public function __destruct()
    {
        @mysql_close($this->conexion);
    }
}

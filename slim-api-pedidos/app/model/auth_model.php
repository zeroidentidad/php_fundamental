<?php
namespace App\Model;

use App\Lib\Response;
use App\Lib\Auth;

class AuthModel
{
    private $db;
    private $table = 'empleado';
    private $response;
    
    public function __CONSTRUCT($db)
    {
        $this->db = $db;
        $this->response = new Response();
    }
    
    public function autenticar($correo, $password){
      $empleado = $this->db
                      ->from($this->table)
                      ->where('correo', $correo)
                      ->where('password', md5($password))
                      ->fetch();

      if (is_object($empleado)) {
        
          $nombre = explode(' ', $empleado->Nombre)[0];

          $token = Auth::SignIn([
              'id' => $empleado->id,
              'Nombre' => $nombre,
              'NombreCompleto' => $empleado->Nombre,
              'EsAdmin' => (bool)$empleado->EsAdmin
            ]);

          $this->response->result = $token;

          return $this->response->setResponse(true);
      } else {
        return $this->response->setResponse(false, "Credenciales no válidas");
      }
      
    }
}
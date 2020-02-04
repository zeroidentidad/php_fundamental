<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Controller {
    private $user;
    
    public function __CONSTRUCT(){
        parent::__construct();
        
        $this->user = ['user' => RestApi::getUserData()];
        
        // Valida que exista el usuario obtenido del token, del caso contrario lo regresa a la pagina de inicio que es nuestro controlador auth
        if($this->user['user'] === null) redirect('');

        $this->load->model('EmpleadoModel', 'em');


    }
    
	
    public function index($p = 0){
        //header
		$this->load->view('template/header',$this->user);
        $this->load->view('template/menu',$this->user);
        //definimos variable para traer la data y mantner la logica de paginacion
        $limite = 8;
        $data = [];
        $total  = 0;
        
        try{
            $result = $this->em->getAll($limite, $p);
            $total  = $result->total;
            $data   = $result->data;
        } catch(Exception $e){
            var_dump($e);
        }

        //inicializacion de paginacion
        $this->pagination->initialize(
            paginacion_config(
                site_url("empleado/index"),
                $total,
                $limite
            )
        );

        $this->load->view('empleado/index.php', [
            'model' => $data
        ]);
        
        //footer
        $this->load->view('template/footer');
	}
    
	public function crud($id = 0){

        $data = null;

        if($id > 0) $data = $this->em->obtener($id);

		$this->load->view('template/header', $this->user);
        $this->load->view('template/menu', $this->user);
        $this->load->view('empleado/crud',[
            'model' => $data
        ]);
        $this->load->view('template/footer');
	}
    
    public function guardar(){}    
    
    public function eliminar($id){}
}

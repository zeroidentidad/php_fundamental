<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleado extends CI_Controller {
    private $user;
    
    public function __CONSTRUCT(){
        parent::__construct();
        
        $this->user = ['user' => RestApi::getUserData()];
        
        // Validar que exista el usuario obtenido del token, en caso contrario regresar a la pagina de inicio en controlador auth
        if($this->user['user'] === null) redirect('');

        $this->load->model('EmpleadoModel', 'em');
    }
    
    public function index($p = 0){
        //header
		$this->load->view('header',$this->user);
        //definimos variable para traer la data y mantener la logica de paginacion
        $limite = 8;
        $data = [];
        $total  = 0;
        
        try{
            $result = $this->em->listar($limite, $p);
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
        $this->load->view('footer');
	}
    
	public function crud($id = 0){

        $data = null;

        if($id > 0) $data = $this->em->obtener($id);

		$this->load->view('header', $this->user);
        $this->load->view('empleado/crud',[
            'model' => $data
        ]);
        $this->load->view('footer');
	}
    
    public function guardar(){

        $id = $this->input->post('id');

        $data = [
            'EsAdmin'  => $this->input->post('EsAdmin'),
            'Nombre'   => $this->input->post('Nombre'),
            'Correo'   => $this->input->post('Correo'),
            'Password' => $this->input->post('Password'),
            'Imagen'   => @encode_image_to_base64($_FILES['File']), // @ overwrite omision error
        ];

        try {
            if (empty($id)) {
                $this->em->registrar($data);
            } else {
                if (empty($data['Password'])) unset($data['Password']);
                $this->em->actualizar($data, $id);
            }
        } catch (Exception $e) {
            if ($e->getMessage() === RestApiErrorCode::UNPROCESSABLE_ENTITY) {
                $errors = RestApi::getEntityValidationFieldsError();
            }
        }


        if (count($errors) === 0) redirect('empleado');
        else {
            $this->load->view('header', $this->user);
            $this->load->view('empleado/validation', [
                'errors' => $errors
            ]);
            $this->load->view('footer');
        }        

    }    
    
    public function eliminar($id){

        $this->em->eliminar($id);
        redirect('empleado');       

    }
}

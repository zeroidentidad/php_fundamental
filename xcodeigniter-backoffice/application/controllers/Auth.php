<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __CONSTRUCT(){
        parent::__construct();

        //cargar modelo
        $this->load->model('AuthModel', 'am');
    }
    
	public function index(){
        $this->load->view('header');
        $this->load->view('auth/index.php');
	}
    
    public function autenticar(){
        $error = '';
        //uso modelo am
        $r = $this->am->autenticar(
            $this->input->post('Correo'),
            $this->input->post('Password')
        );
        
        if($r->response){
            // Setear el token
            RestApi::setToken($r->result);
            
            // User
            $user = RestApi::getUserData();
            
            if($user->EsAdmin == 1) {
                redirect('empleado');
            } else {
                RestApi::destroyToken();
                $error = 'No tiene privilegios de administrador';
            }
        } else {
            $error = $r->message;
        }
        
        $this->load->view('header');
        $this->load->view('auth/index.php', [
            'error' => $error
        ]);
    }
    
    public function logout(){
        RestApi::destroyToken();
        redirect('');
    }
}

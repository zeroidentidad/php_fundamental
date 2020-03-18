<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reporte extends CI_Controller {
    private $user;
    
    public function __CONSTRUCT(){
        parent::__construct();

        $this->user = ['user' => RestApi::getUserData()];

        // Validar que exista el usuario obtenido del token, en caso contrario regresar a la pagina de inicio en controlador auth
        if ($this->user['user'] === null) redirect('');

        $this->load->model('ReporteModel', 'rm');
    }
    
	public function top_empleado(){
		$this->load->view('header', $this->user);
        $this->load->view('reporte/top_empleado',[
            'model'=> $this->rm->topEmpleado()
        ]);
        $this->load->view('footer');
	}
    
	public function top_producto(){
		$this->load->view('header', $this->user);
        $this->load->view('reporte/top_producto', [
            'model' => $this->rm->topProducto()
        ]);
        $this->load->view('footer');
	}
    
	public function venta_mensual(){
		$this->load->view('header', $this->user);
        $this->load->view('reporte/venta_mensual', [
            'model' => $this->rm->ventaMensual()
        ]);
        $this->load->view('footer');
	}
}

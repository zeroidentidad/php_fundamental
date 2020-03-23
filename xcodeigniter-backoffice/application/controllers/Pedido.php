<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pedido extends CI_Controller
{
    public function __CONSTRUCT()
    {
        parent::__construct();

        $this->user = ['user' => RestApi::getUserData()];

        // Valida que exista el usuario obtenido del token, del caso contrario lo regresa a la pagina de inicio que es nuestro controlador auth
        if ($this->user['user'] === null) redirect('');

        $this->load->model('PedidoModel', 'pem');
    }

    public function index($p = 0)
    {
        //header
        $this->load->view('header', $this->user);

        // Definimos unas variables para traer la data y mantener la lógica de paginación
        $limite = 10;
        $data   = [];
        $total  = 0;

        try {
            $result = $this->pem->listar($limite, $p);
            $total  = $result->total;
            $data   = $result->data;
        } catch (Exception $e) {
        }

        // Inicializando paginación
        $this->pagination->initialize(
            paginacion_config(
                site_url("pedido/index"),
                $total,
                $limite
            )
        );

        $this->load->view('pedido/index', [
            'model' => $data
        ]);

        //footer
        $this->load->view('footer');
    }

    public function ver($id = 0)
    {
        $data = null;

        if ($id > 0) $data = $this->pem->obtener($id);

        $this->load->view('header', $this->user);
        $this->load->view('pedido/ver', [
            'model' => $data
        ]);
        $this->load->view('footer');
    }
}

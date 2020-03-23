<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Producto extends CI_Controller
{
    public function __CONSTRUCT()
    {
        parent::__construct();

        $this->user = ['user' => RestApi::getUserData()];

        // Valida que exista el usuario obtenido del token, del caso contrario lo regresa a la pagina de inicio que es nuestro controlador auth
        if ($this->user['user'] === null) redirect('');

        $this->load->model('ProductoModel', 'pm');
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
            $result = $this->pm->listar($limite, $p);
            $total  = $result->total;
            $data   = $result->data;
        } catch (Exception $e) {
        }

        // Inicializando paginación
        $this->pagination->initialize(
            paginacion_config(
                site_url("producto/index"),
                $total,
                $limite
            )
        );

        $this->load->view('producto/index', [
            'model' => $data
        ]);

        //footer
        $this->load->view('footer');
    }

    public function crud($id = 0)
    {
        $data = null;

        if ($id > 0) $data = $this->pm->obtener($id);

        $this->load->view('header', $this->user);
        $this->load->view('producto/crud', [
            'model' => $data
        ]);
        $this->load->view('footer');
    }

    public function guardar()
    {
        $id = $this->input->post('id');

        $data = [
            'Nombre'  => $this->input->post('Nombre'),
            'Precio'   => $this->input->post('Precio'),
            'Imagen'   => @encode_image_to_base64($_FILES['File']),
        ];
        try {

            if (empty($id)) {
                $this->pm->registrar($data);
            } else {
                $this->pm->actualizar($data, $id);
            }
        } catch (Exception $e) {
            if ($e->getMessage() === RestApiErrorCode::UNPROCESSABLE_ENTITY) {
                $errors = RestApi::getEntityValidationFieldsError();
            }
        }


        if (count($errors) === 0) redirect('producto');
        else {
            $this->load->view('header', $this->user);
            $this->load->view('producto/validation', [
                'errors' => $errors
            ]);
            $this->load->view('footer');
        }
    }

    public function eliminar($id)
    {

        $this->pm->eliminar($id);
        redirect('producto');
    }
}

<?php
namespace App\Controllers;

use App\Helpers\ResponseHelper;
use App\Repositories\ProductoRepository;
use Core\{Controller};
use App\Models\Producto;
use App\Validations\ProductoValidation;

class ProductoController extends Controller {
    private $productoRepo;

    public function __construct() {
        parent::__construct();
        $this->productoRepo = new ProductoRepository();
    }

    public function getIndex() {
        return $this->render('producto/index.twig', [
            'title' => 'Productos'
        ]);
    }

    public function postGrid() {
        print_r($this->productoRepo->listar());
    }

    public function getCrud($id=0) {
        $model = (
            $id === 0
                ? new Producto
                : $this->productoRepo->obtener($id)
        );

        return $this->render('producto/crud.twig', [
            'title' => 'Productos',
            'model' => $model
        ]);
    }

    public function postGuardar() {
        ProductoValidation::validate($_POST);

        $model = new Producto;
        $model->id = $_POST['id'];
        $model->nombre = $_POST['nombre'];
        $model->marca = $_POST['marca'];
        $model->costo = $_POST['costo'];
        $model->precio = $_POST['precio'];

        $foto = null;
        if(!empty($_FILES['foto'])) {
            $foto = $_FILES['foto'];
        }        

        $rh = $this->productoRepo->guardar($model, $foto);

        if($rh->response) {
            $rh->href = 'producto';
        }

        print_r(
            json_encode($rh)
        );
    }

    public function postEliminar() {
        print_r(
            json_encode(
                $this->productoRepo->eliminar($_POST['id'])
            )
        );
    }   

    public function postImportar() {
        $rh = new ResponseHelper();
        if(empty($_FILES['archivo'])){
            $rh->setResponse(false, 'Debe adjuntar archivo CSV');
        } else {
            $rh = $this->productoRepo->importar($_FILES['archivo']);
            if($rh->response) {
                $rh->href = 'self';
            }
        }

        print_r(
            json_encode($rh)
        );        
    }

    public function getExportar() {
        header("Content-type: application/vnd.ms-excel");
        header("Content-Disposition: attachment;filename=archivo_exportado.xls");
        header("Pragma: no-cache");
        header("Expires: 0");

        return $this->render('producto/excel.twig', [
            'model' => $this->productoRepo->todo()
        ]);
    }

}
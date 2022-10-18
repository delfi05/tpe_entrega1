<?php
require_once './app/models/cliente_model.php';
require_once './app/views/cliente_view.php';
require_once './app/helpers/auth_helper.php';

require_once './app/models/producto_model.php';

class ClienteController {
    private $model;
    private $view;

    private $productModel;

    //armo funcion constructor para que este instancie/una a los dos 
    public function __construct(){
        $this->model= new cliente_model();
        $this->view= new cliente_view();
        // barrera de seguridad
        $authHelper = new AuthHelper();

        $this->productModel = new producto_model();
       
    }

    //show = mostrar
    public function showCliente(){
        session_start();
        $cliente = $this->model->getAllCliente();
        $this->view->showCliente($cliente);
    }

    public function addCliente(){
        //valida entrada de datos

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $dni = $_POST['dni'];

        $this->model->insertCliente($nombre,$apellido,$dni);
    
        header("Location: " . BASE_URL . "cliente");
    }

    public function editarCliente($id_cliente){
        $clienteById = $this->model->getClienteById($id_cliente);
        $this->view->editarCliente($clienteById);
    }

    public function editarInfoCliente(){
        //validar entrada de datos
        if(!empty($_POST)&& isset ($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['dni'])){
            $id_cliente = $_POST['id'];  
            $nombre = $_POST['nombre'];  
            $apellido = $_POST['apellido'];  
            $dni = $_POST['dni'];  
            
        }
        $this->model->editarCliente($id_cliente, $nombre, $apellido, $dni); // paso name de los inputs, al model
        header("Location: " . BASE_URL . "cliente");
    }

    public function deleteCliente($id){
        $cantidad = $this->productModel->productoPorCliente($id);
        if (count($cantidad) > 0) {
            $this->view->deleteCliente($id);
        }
        else {
            $this->model->deleteClienteById($id);
            header("Location: " . BASE_URL . "cliente");
        }
    }
}
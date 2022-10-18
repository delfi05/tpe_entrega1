<?php
require_once './app/models/producto_model.php';
require_once './app/views/producto_view.php';
require_once './app/models/cliente_model.php';
require_once './app/helpers/auth_helper.php';


class ProductoController{
    private $model;
    private $view;
    private $modelcliente;
    private $authHelper; //no dejar entrar a la f(x) addproduct a traves de la url


    //armo funcion constructor para que este instancie/una a los dos 
    public function __construct(){
        $this->model= new producto_model();
        $this->view= new producto_view();
        $this->modelcliente= new cliente_model();

        // barrera de seguridad
        $this->authHelper = new AuthHelper();
       
    }

    //get = OBTENER
    //show = mostrar
    public function mostrarProducto(){
        session_start();
        $productsJoinClientes = $this->model->getProductsJoinClientes();
        $clientes= $this->modelcliente->getAllCliente();
        $this->view->mostrarProducto($productsJoinClientes, $clientes);
    }

    public function addProducto(){
        //valida entrada de datos
        if(!empty($_POST)&& isset ($_POST['producto'])&& isset ($_POST['talle']) && isset($_POST['color']) && isset($_POST['marca'])&& isset($_POST['descripcion'])&&isset($_POST['cliente'])){
            $this->authHelper->checkLoggedIn();

            $producto = $_POST['producto'];
            $talle = $_POST['talle'];
            $color = $_POST['color'];
            $marca = $_POST['marca'];
            $descripcion = $_POST['descripcion'];
            $id_cliente = $_POST['cliente'];
            
        }
        $this->model->insertProducto($producto, $talle, $color, $marca, $descripcion, $id_cliente);
    
        header("Location: " . BASE_URL);
    }

    public function editarProducto($id_producto){
        session_start();
        $productoById = $this->model->getProductById($id_producto);
        $clientes= $this->modelcliente->getAllCliente();
        //print_r($productoById); imprime x pantalla
        $this->view->editarProducto($productoById,$clientes);
    }

    public function editarInfoProducto(){
        //validar entrada de datos
        if(!empty($_POST)&& isset ($_POST['producto']) && isset ($_POST['talle']) && isset($_POST['color']) && isset($_POST['marca'])&& isset($_POST['descripcion'])&& isset($_POST['cliente'])){
            $id_producto = $_POST['id'];  
            $producto = $_POST['producto'];
            $talle = $_POST['talle'];  
            $color = $_POST['color'];  
            $marca = $_POST['marca']; 
            $descripcion = $_POST['descripcion'];  
            $id_cliente = $_POST['cliente'];
        }
        $this->model->editarProducto($id_producto, $producto, $talle, $color, $marca, $descripcion, $id_cliente); // paso name de los inputs, al model
        header("Location: " . BASE_URL);
    }

    public function verDetalles($id){
        $detalles = $this->model->getProductById($id);
        $this->view->verdetalles($detalles);
    }

    public function productosPorCliente($id){
        $detalles = $this->model->productoPorCliente($id);
        $this->view->productosPorClientes($detalles);
    }

    public function deleteProducto($id){
        $this->model->deleteProductoById($id);
        header("Location: " . BASE_URL);
    }

}
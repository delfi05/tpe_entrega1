<!-- unico punto de entrada a la app -->
<?php
require_once ('./app/controllers/producto_controller.php');
require_once ('./app/controllers/cliente_controller.php');
require_once ('./app/controllers/auth_controller.php');

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action ='productos';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

//muestra la url corta ej: dev/home --> ['dev'; home]
$params= explode ('/',$action);


//tabla de ruteo
switch ($params[0]){
    case 'login':
        $auth_controller = new AuthController();
        $auth_controller->showLogin();
        break;
    case 'validate':
        $auth_controller = new AuthController();
        $auth_controller->validateUser();
        break;
    case 'logout':
        $auth_controller = new AuthController();
        $auth_controller->logout();
        break;
    case 'productos':
        $producto_controller = new ProductoController();
        $producto_controller->mostrarProducto();
        break;
    case 'add':
        $producto_controller = new ProductoController();
        $producto_controller->addProducto();
        break;
    case 'edit':
        // url/edit/2/pepe
        $id_producto = $params[1];   // guarde id de cada item en la variable  $id_producto.
        // $usuario = $params[2]; 
        $producto_controller = new ProductoController();
        $producto_controller->editarProducto($id_producto);
        break;
    case 'infoEditProducto':
        $producto_controller = new ProductoController();
        $producto_controller->editarInfoProducto(); 
        break;
    case 'delete':
        $id = $params[1];
        $producto_controller = new ProductoController();
        $producto_controller->deleteProducto($id);
        break;

    case 'verdetalles':
        $id = $params[1];
        $producto_controller = new ProductoController();
        $producto_controller->verDetalles($id);
        break;
    case 'productosporcliente':
        $id=$params[1];
        $producto_controller = new ProductoController();
        $producto_controller->productosPorCliente($id);
        break;
        
    case 'cliente':
        $cliente_controller = new ClienteController();
        $cliente_controller->showCliente();
        break;
    case 'addcliente':
        $cliente_controller = new ClienteController();
        $cliente_controller->addCliente();
        break;
    case 'editar':
        $id_cliente = $params[1];   // guarde id de cada item en la variable  $id_cliente. 
        $cliente_controller = new ClienteController();
        $cliente_controller->editarCliente($id_cliente);
        break;
    case 'infoEditarCliente':
        $cliente_controller = new ClienteController();
        $cliente_controller->editarInfoCliente(); 
        break;
    case 'delete_cliente':
        $id = $params[1];
        $cliente_controller = new ClienteController();
        $cliente_controller->deleteCliente($id);
        break;
    default:
        $auth_controller = new AuthController();
        $auth_controller->error404();
        break;
}
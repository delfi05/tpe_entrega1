<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class producto_view {
    private $smarty;

    public function __construct(){
        //inicializo smarty
        $this->smarty = new Smarty();
    }

    public function mostrarProducto($productsJoinClientes, $clientes){
        //count=contar
        $this->smarty->assign('count', count($productsJoinClientes));
        $this->smarty->assign('productsJoinClientes', $productsJoinClientes);
        $this->smarty->assign('clientes', $clientes);
        //$this->smarty->assign('saludar', 'hola');
        //mostrar el tpl
        $this->smarty->display('itemproductos.tpl');

    }
    public function verdetalles($detalles){
        $this->smarty->assign('detalles', $detalles);
        $this->smarty->display('verdetalles.tpl');
    }

    public function productosPorClientes($detalles){
        $this->smarty->assign('count', count($detalles));
        $this->smarty->assign('detalles', $detalles);
        $this->smarty->display('prodporcliente.tpl');
    }

    public function editarProducto($productoById, $clientes){            
        $this->smarty->assign('count', count($productoById));           
        $this->smarty->assign('titulo','Edite un producto');            
        $this->smarty->assign('productoById', $productoById); 
        $this->smarty->assign('clientes', $clientes);          
        $this->smarty->display('itemproductoamodificar.tpl');         
    }


}
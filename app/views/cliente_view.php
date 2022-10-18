<?php
require_once './libs/smarty-4.2.1/libs/Smarty.class.php';

class cliente_view {
    private $smarty;

    public function __construct(){
        //inicializo smarty
        $this->smarty = new Smarty();
    }

    public function showCliente($cliente){
        //count=contar
        $this->smarty->assign('count', count($cliente));
        $this->smarty->assign('cliente', $cliente);
        $this->smarty->display('itemclientes.tpl');
    }

    public function editarCliente($clienteById){            
        $this->smarty->assign('count', count($clienteById));           
        $this->smarty->assign('titulo','Cliente a modificar');        
        $this->smarty->assign('clienteById', $clienteById);           
        $this->smarty->display('itemclientemodificar.tpl');         
    }

    function deleteCliente($id){        
        $this->smarty->assign('errorDelete', $id);           
        $this->smarty->display('errorDelete.tpl'); 
    }

}
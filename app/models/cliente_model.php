<?php

class cliente_model {
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tienda;charset=utf8', 'root', '');
    }

    //llamar a los productos 
    public function getAllCliente() {
        
        $query = $this->db->prepare("SELECT * FROM cliente");
        $query->execute(); //ejecuta la consulta de arriba

        //obtengo los resultados
        $cliente = $query->fetchAll(PDO::FETCH_OBJ); //devuelve arreglo de objetos

        return $cliente;
    }

    public function getClienteById($id_cliente) { // El getCliente donde me traigo el item a mostrar para editar
        $query = $this->db->prepare("SELECT * FROM cliente WHERE id_cliente = ?");
        $query->execute([$id_cliente]);

        //obtengo los resultados
        $clienteById = $query->fetchAll(PDO::FETCH_OBJ); //devuelve arreglo de objetos

        return $clienteById;
    }

    public function insertCliente($nombre, $apellido, $dni) {
        $query= $this->db->prepare("INSERT INTO cliente (nombre, apellido, dni) VALUES (?, ?, ?)");
        $query->execute([$nombre, $apellido, $dni]);

        return $this-> db->lastInsertId();
    }

    public function editarCliente($id_cliente, $nombre, $apellido, $dni){ // parametros que traigo del controler
        $query = $this->db->prepare("UPDATE `cliente` SET `nombre` = ?, `apellido` = ?, `dni` = ? WHERE `id_cliente` = ?");

        try{
            $query->execute([$nombre, $apellido, $dni, $id_cliente]); // parametros de arriba
        }
        catch(PDOException $e){
            var_dump($e);
        }
    }

    public function deleteClienteById($id){
        $query= $this->db->prepare('DELETE FROM cliente WHERE id_cliente = ?');
        $query->execute([$id]);
    }

}
<?php

class producto_model {
    private $db;

    public function __construct(){
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_tienda;charset=utf8', 'root', '');
    }

    public function getProductsJoinClientes(){
        $query = $this->db->prepare("SELECT p.*, c.* FROM producto p INNER JOIN cliente c ON p.id_cliente = c.id_cliente");
        $query->execute();
        $productsJoinClientes = $query->fetchAll(PDO::FETCH_OBJ);
        return $productsJoinClientes;

    }
    public function getProductById($id_producto) { // El getProduct donde me traigo el item a mostrar para editar
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_producto = ?");
        $query->execute([$id_producto]);

        //obtengo los resultados
        $productoById = $query->fetchAll(PDO::FETCH_OBJ); //devuelve arreglo de objetos

        return $productoById;
    }

    public function productoPorCliente($id){
        $query = $this->db->prepare("SELECT * FROM producto WHERE id_cliente = ?");
        $query->execute([$id]);

        //obtengo los resultados
        $prodxcliente = $query->fetchAll(PDO::FETCH_OBJ); //devuelve arreglo de objetos

        return $prodxcliente;
    }

    public function insertProducto($producto, $talle, $color, $marca, $descripcion, $id_cliente) {
        $query= $this->db->prepare("INSERT INTO producto (producto,talle, color, marca, descripcion, id_cliente) VALUES (?,?, ?, ?, ?, ?)");
        $query->execute([$producto,$talle, $color, $marca, $descripcion, $id_cliente]);

        return $this-> db->lastInsertId();
    }

    public function editarProducto($id_producto, $producto, $talle, $color, $marca, $descripcion, $id_cliente){ // parametros que traigo del controler
        $query = $this->db->prepare("UPDATE `producto` SET `producto` = ?, `talle` = ?, `color` = ?, `marca` = ?, `descripcion` = ?, `id_cliente` = ? WHERE `id_producto` = ?");

        try{
            $query->execute([$producto, $talle, $color, $marca, $descripcion, $id_cliente, $id_producto]); // parametros de arriba
        }
        catch(PDOException $e){
            var_dump($e);
        }
    }

    public function deleteProductoById($id){
        $query= $this->db->prepare('DELETE FROM producto WHERE id_producto = ?');
        $query->execute([$id]);
    }


}
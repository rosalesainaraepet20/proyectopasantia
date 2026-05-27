<?php

require_once "Database.php";

class Producto {

    private $conexion;

    public function __construct() {

        $db = new Database();
        $this->conexion = $db->conectar();
    }

    public function listar() {

        $sql = "SELECT * FROM productos";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function agregar($nombre,$descripcion,$precio,$stock){

        $sql = "INSERT INTO productos(nombre,descripcion,precio,stock)
                VALUES(:nombre,:descripcion,:precio,:stock)";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":nombre",$nombre);
        $stmt->bindParam(":descripcion",$descripcion);
        $stmt->bindParam(":precio",$precio);
        $stmt->bindParam(":stock",$stock);

        return $stmt->execute();
    }
}
?>
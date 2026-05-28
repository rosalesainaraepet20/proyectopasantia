<?php

require_once "Database.php";

class Producto {

    private $conexion;

    public function __construct() {

        $db = new Database();
        $this->conexion = $db->conectar();
    }

    // LISTAR
    public function obtenerProductos() {

        $sql = "SELECT * FROM productos";

        $stmt = $this->conexion->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // AGREGAR
    public function agregar($nombre, $descripcion, $precio, $stock) {

        $sql = "INSERT INTO productos(nombre, descripcion, precio, stock)
                VALUES(:nombre, :descripcion, :precio, :stock)";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":stock", $stock);

        return $stmt->execute();
    }

    // OBTENER UN PRODUCTO
    public function obtenerProducto($id){

        $sql = "SELECT * FROM productos WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // EDITAR
    public function editar($id, $nombre, $descripcion, $precio, $stock){

        $sql = "UPDATE productos
                SET nombre = :nombre,
                    descripcion = :descripcion,
                    precio = :precio,
                    stock = :stock
                WHERE id = :id";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":descripcion", $descripcion);
        $stmt->bindParam(":precio", $precio);
        $stmt->bindParam(":stock", $stock);

        return $stmt->execute();
    }
    // ELIMINAR
public function eliminar($id){

    $sql = "DELETE FROM productos WHERE id = :id";

    $stmt = $this->conexion->prepare($sql);

    $stmt->bindParam(":id", $id);

    return $stmt->execute();
}
}

?>
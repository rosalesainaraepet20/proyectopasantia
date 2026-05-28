<?php

require_once "Database.php";

class Usuario {

    private $conexion;

    public function __construct() {

        $db = new Database();
        $this->conexion = $db->conectar();
    }

    public function registrar($nombre, $email, $password) {

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuarios(nombre,email,password)
                VALUES(:nombre,:email,:password)";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":nombre", $nombre);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password", $passwordHash);

        return $stmt->execute();
    }

    public function login($email, $password) {

        $sql = "SELECT * FROM usuarios WHERE email = :email";

        $stmt = $this->conexion->prepare($sql);

        $stmt->bindParam(":email", $email);

        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if($usuario && password_verify($password, $usuario['password'])) {

            $_SESSION['usuario'] = $usuario['nombre'];

            return true;
        }

        return false;
    }
}
?>
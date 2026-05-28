<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header("Location: login.php");
    exit();
}

require_once "clases/Producto.php";

$producto = new Producto();

if(isset($_GET['id'])){

    $producto->eliminar($_GET['id']);
}

header("Location: index.php");
exit();

?>
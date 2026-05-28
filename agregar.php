<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header("Location: login.php");
    exit();
}

require_once "clases/Producto.php";

$mensaje = "";

if($_POST){

    $producto = new Producto();

    if($producto->agregar(
        $_POST['nombre'],
        $_POST['descripcion'],
        $_POST['precio'],
        $_POST['stock']
    )){

        $mensaje = "Producto agregado correctamente";
    header("Refresh:1; url=index.php");
    } else {

        $mensaje = "Error al agregar";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Agregar producto</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>
<body class="container mt-5">

<h2>Agregar producto</h2>

<?php if($mensaje != ""){ ?>

<div class="alert alert-info">
    <?php echo $mensaje; ?>
</div>

<?php } ?>

<form method="POST">

<input
type="text"
name="nombre"
class="form-control mb-3"
placeholder="Nombre"
required>

<textarea
name="descripcion"
class="form-control mb-3"
placeholder="Descripción"
required></textarea>

<input
type="number"
step="0.01"
name="precio"
class="form-control mb-3"
placeholder="Precio"
required>

<input
type="number"
name="stock"
class="form-control mb-3"
placeholder="Stock"
required>

<button class="btn btn-primary">
Agregar
</button>

</form>

</body>
</html>
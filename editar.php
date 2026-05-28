<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header("Location: login.php");
    exit();
}

require_once "clases/Producto.php";

$producto = new Producto();

$id = $_GET['id'];

$datos = $producto->obtenerProducto($id);

$mensaje = "";

if($_POST){

    if($producto->editar(
        $id,
        $_POST['nombre'],
        $_POST['descripcion'],
        $_POST['precio'],
        $_POST['stock']
    )){

        $mensaje = "Producto editado correctamente";
        header("Refresh:1; url=index.php");
        $datos = $producto->obtenerProducto($id);

    } else {

        $mensaje = "Error al editar";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Editar producto</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>
<body class="container mt-5">

<h2>Editar producto</h2>

<?php if($mensaje != ""){ ?>

<div class="alert alert-info">
    <?php echo $mensaje; ?>
</div>

<?php } ?>

<form method="POST">

    <label class="form-label">Nombre</label>
    <input
    type="text"
    name="nombre"
    class="form-control mb-3"
    value="<?php echo $datos['nombre']; ?>"
    required>

    <label class="form-label">Descripción</label>
    <textarea
    name="descripcion"
    class="form-control mb-3"
    required><?php echo $datos['descripcion']; ?></textarea>

    <label class="form-label">Precio</label>
    <input
    type="number"
    step="0.01"
    name="precio"
    class="form-control mb-3"
    value="<?php echo $datos['precio']; ?>"
    required>

    <label class="form-label">Cantidad</label>
    <input
    type="number"
    name="stock"
    class="form-control mb-3"
    value="<?php echo $datos['stock']; ?>"
    required>

    <button class="btn btn-warning">
        Guardar cambios
    </button>

</form>

</body>
</html>
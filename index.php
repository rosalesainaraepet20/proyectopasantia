<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header("Location: login.php");
    exit();
}

require_once "clases/Producto.php";

$producto = new Producto();

$productos = $producto->obtenerProductos();

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Productos</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>
<body class="container mt-5">
<nav class="navbar navbar-dark bg-dark mb-4">

<div class="container-fluid">

<span class="navbar-brand">
Sistema de Productos
</span>

<div>

<a href="agregar.php" class="btn btn-primary">
Agregar producto
</a>

<a href="logout.php" class="btn btn-danger">
Cerrar sesión
</a>

</div>

</div>

</nav>
<h1>Bienvenid@ <?php echo $_SESSION['usuario']; ?></h1>



<table class="table table-bordered">


<tr>
    
    <th>Nombre</th>
    <th>Descripción</th>
    <th>Precio</th>
    <th>Stock</th>
    <th>Acciones</th>
</tr>
<?php foreach($productos as $p){ ?>

<tr>

    <td><?php echo $p['nombre']; ?></td>

    <td><?php echo $p['descripcion']; ?></td>

    <td><?php echo $p['precio']; ?></td>

    <td><?php echo $p['stock']; ?></td>

    <td>

        <a
        href="editar.php?id=<?php echo $p['id']; ?>"
        class="btn btn-warning btn-sm">

        Editar

        </a>

        <a
        href="eliminar.php?id=<?php echo $p['id']; ?>"
        class="btn btn-danger btn-sm"
        onclick="return confirm('¿Eliminar producto?')">

        Eliminar

        </a>

    </td>

</tr>

<?php } ?>

</table>

</body>
</html>
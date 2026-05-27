<?php

session_start();

if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
}

require_once "clases/Producto.php";

$producto = new Producto();

$productos = $producto->listar();

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<title>Productos</title>

</head>
<body class="container mt-5">

<h2>Listado de Productos</h2>

<a href="agregar.php" class="btn btn-primary mb-3">
Agregar Producto
</a>

<a href="logout.php" class="btn btn-danger mb-3">
Cerrar sesión
</a>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Nombre</th>
<th>Descripción</th>
<th>Precio</th>
<th>Stock</th>
</tr>

<?php foreach($productos as $p){ ?>

<tr>

<td><?php echo $p['id']; ?></td>
<td><?php echo $p['nombre']; ?></td>
<td><?php echo $p['descripcion']; ?></td>
<td><?php echo $p['precio']; ?></td>
<td><?php echo $p['stock']; ?></td>

</tr>

<?php } ?>

</table>

</body>
</html>
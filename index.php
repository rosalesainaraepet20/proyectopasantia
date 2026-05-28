<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header("Location: login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<title>Inicio</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="container mt-5">

<h1>
Bienvenido <?php echo $_SESSION['usuario']; ?>
</h1>

<a href="logout.php" class="btn btn-danger">
Cerrar sesión
</a>

</body>
</html>
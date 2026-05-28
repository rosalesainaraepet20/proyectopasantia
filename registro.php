<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once "clases/Usuario.php";

$mensaje = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario = new Usuario();

    $resultado = $usuario->registrar(
        $_POST['nombre'],
        $_POST['email'],
        $_POST['password']
    );

    if($resultado){

        $mensaje = "Usuario registrado correctamente";

    } else {

        $mensaje = "Error al registrar";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">
<title>Registro</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css">
</head>

<body class="container mt-5">

<h2>Registro</h2>

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

<input
type="email"
name="email"
class="form-control mb-3"
placeholder="Email"
required>

<input
type="password"
name="password"
class="form-control mb-3"
placeholder="Contraseña"
required>

<button type="submit" class="btn btn-primary">
Registrarse
</button>

</form>

<br>

<a href="login.php">
Ir al login
</a>

</body>
</html>
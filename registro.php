<?php

require_once "clases/Usuario.php";

$mensaje = "";

if($_POST){

    $usuario = new Usuario();

    if($usuario->registrar(
        $_POST['nombre'],
        $_POST['email'],
        $_POST['password']
    )){
        $mensaje = "Usuario registrado";
    } else {
        $mensaje = "Error";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<title>Registro</title>

</head>
<body class="container mt-5">

<h2>Registro</h2>

<?php if($mensaje != ""){ ?>
<div class="alert alert-success">
    <?php echo $mensaje; ?>
</div>
<?php } ?>

<form method="POST">

<input type="text" name="nombre" class="form-control mb-3" placeholder="Nombre" required>

<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Contraseña" required>

<button class="btn btn-primary">
    Registrarse
</button>

</form>

</body>
</html>
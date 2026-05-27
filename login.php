<?php

session_start();

require_once "clases/Usuario.php";

$error = "";

if($_POST){

    $usuario = new Usuario();

    if($usuario->login(
        $_POST['email'],
        $_POST['password']
    )){

        header("Location: index.php");

    } else {

        $error = "Datos incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>

<meta charset="UTF-8">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<title>Login</title>

</head>
<body class="container mt-5">

<h2>Login</h2>

<?php if($error != ""){ ?>
<div class="alert alert-danger">
    <?php echo $error; ?>
</div>
<?php } ?>

<form method="POST">

<input type="email" name="email" class="form-control mb-3" placeholder="Email" required>

<input type="password" name="password" class="form-control mb-3" placeholder="Contraseña" required>

<button class="btn btn-success">
    Ingresar
</button>

</form>

</body>
</html>
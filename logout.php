
<?php

session_start();

if(!isset($_SESSION['usuario'])){

    header("Location: login.php");
}

session_start();

session_destroy();

header("Location: login.php");

?>
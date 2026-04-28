<?php
$nombre_usuario = $_POST['nombre'];
$n_control = $_POST['n_control'];
$password = $_POST['password'];

if ($n_control == $password) {
    header("Location: inventario.php");
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>

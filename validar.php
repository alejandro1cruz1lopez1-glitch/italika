<?php
$nombre_usuario = $_POST['nombre'];
$n_control = $_POST['n_control'];
$password = $_POST['password'];

if ($n_control ==$password {
    
    echo "<h1>¡Bienvenido, " . $nombre_usuario . "!</h1>";
    echo "<p>Has ingresado correctamente al sistema de Italika.</p>";
    echo "<br><a href='index.php'>Cerrar Sesión</a>";

} else {
    echo "<h1>Error de acceso</h1>";
    echo "<p>Lo siento, el número de control o la contraseña son incorrectos.</p>";
    echo "<br><a href='login.php'>Intentar de nuevo</a>";
}
?>

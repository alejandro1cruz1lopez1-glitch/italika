<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
// 1. CONEXIÓN (Ajustada a tu DB 'italikacinco')
$conexion = mysqli_connect("localhost", "root", "", "italikacinco");

if (!$conexion) {
    die("Fallo la conexión: " . mysqli_connect_error());
}

// 2. ACCIÓN: ELIMINAR (DELETE)
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    mysqli_query($conexion, "DELETE FROM refacciones WHERE id=$id");
    header("Location: inventario.php");
    exit();
}

// 3. ACCIÓN: CREAR (CREATE)
if (isset($_POST['guardar'])) {
    $nom = $_POST['nombre'];
    $cant = $_POST['cantidad'];
    $pre = $_POST['precio'];
    $cat = $_POST['categoria'];
    
    // Insertamos en tu tabla 'refacciones'
    $query = "INSERT INTO refacciones (nombre, cantidad, precio, categoria) VALUES ('$nom', $cant, $pre, '$cat')";
    mysqli_query($conexion, $query);
    header("Location: inventario.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inventario - Italika Cinco</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark mb-4 shadow">
        <div class="container">
            <span class="navbar-brand fw-bold">ITALIKA_cinco</span>
            <a href="login.php" class="btn btn-outline-light btn-sm">Salir</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">Nueva Refacción</div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-2"><label>Nombre:</label><input type="text" name="nombre" class="form-control" required></div>
                            <div class="mb-2"><label>Cantidad:</label><input type="number" name="cantidad" class="form-control" required></div>
                            <div class="mb-2"><label>Precio:</label><input type="number" step="0.01" name="precio" class="form-control" required></div>
                            <div class="mb-3">
                                <label>Categoría:</label>
                                <select name="categoria" class="form-select">
                                    <option>Motor</option><option>Llantas</option><option>Frenos</option><option>Eléctrico</option>
                                </select>
                            </div>
                            <button type="submit" name="guardar" class="btn btn-primary w-100">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3">Gestión de Inventario</h5>
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr><th>ID</th><th>Nombre</th><th>Stock</th><th>Precio</th><th>Acciones</th></tr>
                            </thead>
                            <tbody>
                                <?php
                                // Consulta a tu tabla 'refacciones'
                                $res = mysqli_query($conexion, "SELECT * FROM refacciones ORDER BY id DESC");
                                while($f = mysqli_fetch_array($res)) {
                                ?>
                                <tr>
                                    <td><?php echo $f['id']; ?></td>
                                    <td><?php echo $f['nombre']; ?></td>
                                    <td><span class="badge bg-secondary"><?php echo $f['cantidad']; ?></span></td>
                                    <td>$<?php echo number_format($f['precio'], 2); ?></td>
                                    <td>
                                        <button class="btn btn-sm btn-info text-white">Editar</button>
                                        <a href="inventario.php?eliminar=<?php echo $f['id']; ?>" 
                                           class="btn btn-sm btn-danger" 
                                           onclick="return confirm('¿Eliminar esta refacción?')">Borrar</a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

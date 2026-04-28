<?php
// CONEXIÓN
$conexion = mysqli_connect("localhost", "root", "", "italikacinco");

// ACCIÓN: ELIMINAR (DELETE)
if (isset($_GET['eliminar'])) {
    $id = $_GET['eliminar'];
    mysqli_query($conexion, "DELETE FROM refacciones WHERE id=$id");
    header("Location: inventario.php");
}

// ACCIÓN: CREAR (CREATE)
if (isset($_POST['guardar'])) {
    $nom = $_POST['nombre'];
    $cant = $_POST['cantidad'];
    $pre = $_POST['precio'];
    $cat = $_POST['categoria'];
    mysqli_query($conexion, "INSERT INTO refacciones (nombre, cantidad, precio, categoria) VALUES ('$nom', $cant, $pre, '$cat')");
    header("Location: inventario.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Inventario Italika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark mb-4">
        <div class="container">
            <span class="navbar-brand">ITALIKA_cinco - Panel de Gestión</span>
            <a href="login.php" class="btn btn-outline-danger btn-sm">Cerrar Sesión</a>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white fw-bold">Agregar Refacción</div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="mb-2">
                                <label>Nombre:</label>
                                <input type="text" name="nombre" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Cantidad:</label>
                                <input type="number" name="cantidad" class="form-control" required>
                            </div>
                            <div class="mb-2">
                                <label>Precio:</label>
                                <input type="number" step="0.01" name="precio" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label>Categoría:</label>
                                <select name="categoria" class="form-select">
                                    <option>Motor</option>
                                    <option>Llantas</option>
                                    <option>Frenos</option>
                                    <option>Eléctrico</option>
                                </select>
                            </div>
                            <button type="submit" name="guardar" class="btn btn-success w-100">Guardar en MySQL</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="h4 mb-3">Listado de Inventario (50+ Registros)</h2>
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Refacción</th>
                                    <th>Stock</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $res = mysqli_query($conexion, "SELECT * FROM refacciones ORDER BY id DESC");
                                while($f = mysqli_fetch_array($res)) {
                                ?>
                                <tr>
                                    <td><?php echo $f['id']; ?></td>
                                    <td><?php echo $f['nombre']; ?></td>
                                    <td><span class="badge bg-info text-dark"><?php echo $f['cantidad']; ?></span></td>
                                    <td>$<?php echo $f['precio']; ?></td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">Editar</a>
                                        <a href="inventario.php?eliminar=<?php echo $f['id']; ?>" 
                                           onclick="return confirm('¿Seguro que deseas eliminarlo?')" 
                                           class="btn btn-danger btn-sm">Eliminar</a>
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

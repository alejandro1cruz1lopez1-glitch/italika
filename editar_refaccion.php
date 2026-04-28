<?php
$conexion = mysqli_connect("localhost", "alejandro", "AAbb11..", "italikacinco");

// 1. Obtener los datos actuales de la refacción
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $res = mysqli_query($conexion, "SELECT * FROM refacciones WHERE id=$id");
    $f = mysqli_fetch_array($res);
}

// 2. Procesar la actualización
if (isset($_POST['actualizar'])) {
    $id_up = $_POST['id'];
    $nom = $_POST['nombre'];
    $cant = $_POST['cantidad'];
    $pre = $_POST['precio'];
    $cat = $_POST['categoria'];

    $sql = "UPDATE refacciones SET nombre='$nom', cantidad=$cant, precio=$pre, categoria='$cat' WHERE id=$id_up";
    
    if (mysqli_query($conexion, $sql)) {
        header("Location: inventario.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Refacción - Italika</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-header bg-warning text-dark fw-bold">Modificar Refacción #<?php echo $id; ?></div>
                    <div class="card-body">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?php echo $f['id']; ?>">
                            
                            <div class="mb-3">
                                <label>Nombre:</label>
                                <input type="text" name="nombre" class="form-control" value="<?php echo $f['nombre']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Cantidad:</label>
                                <input type="number" name="cantidad" class="form-control" value="<?php echo $f['cantidad']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Precio:</label>
                                <input type="number" step="0.01" name="precio" class="form-control" value="<?php echo $f['precio']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label>Categoría:</label>
                                <select name="categoria" class="form-select">
                                    <option <?php if($f['categoria']=='Motor') echo 'selected'; ?>>Motor</option>
                                    <option <?php if($f['categoria']=='Llantas') echo 'selected'; ?>>Llantas</option>
                                    <option <?php if($f['categoria']=='Frenos') echo 'selected'; ?>>Frenos</option>
                                    <option <?php if($f['categoria']=='Eléctrico') echo 'selected'; ?>>Eléctrico</option>
                                </select>
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" name="actualizar" class="btn btn-primary w-100">Guardar Cambios</button>
                                <a href="inventario.php" class="btn btn-secondary w-100">Cancelar</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Italika TSO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand">ITALIKA_cinco</span>
            <a href="index.php" class="btn btn-outline-light btn-sm">Regresar</a>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-5">
                
                <div class="text-center mb-4">
                    <h1 class="fw-bold">Ingresar al Sistema</h1>
                    <p class="text-muted">Identifícate para gestionar el inventario</p>
                </div>

                <form action="validar.php" method="POST" class="border p-4 shadow-sm rounded">
                    
                    <div class="mb-3">
                        <label class="form-label fw-bold">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control" placeholder="Escribe tu nombre" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Número de Control</label>
                        <div class="input-group">
                            <input type="text" name="n_control" class="form-control" placeholder="Ej. 21160000" required>
                            <span class="input-group-text text-muted">@itoaxaca.edu.mx</span>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-bold">Contraseña</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary fw-bold">Acceder</button>
                    </div>
                </form>

            </div>
        </div>

        <hr class="mt-5">

        <footer class="text-center py-3">
            <p><strong>Alumno:</strong> Tu Nombre Real | <strong>No. Control:</strong> Tu Matrícula</p>
            <p>Tecnológico Nacional de México - Instituto Tecnológico de Oaxaca</p>
            <p>&copy; 2026 - Taller de Sistemas Operativos</p>
        </footer>
    </div>

</body>
</html>

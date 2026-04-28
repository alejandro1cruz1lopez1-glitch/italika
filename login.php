<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Italika TSO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #1a1a1a; color: white; }
        .navbar { background-color: #ffcc00; } /* Amarillo Italika */
        .card { background-color: #2b2b2b; border: 1px solid #ffcc00; }
        .input-group-text { background-color: #444; color: #ccc; border: none; }
        .form-control { background-color: #333; color: white; border: 1px solid #555; }
        .form-control:focus { background-color: #444; color: white; border-color: #ffcc00; box-shadow: none; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg shadow-sm mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="index.php">ITALIKA | TSO</a>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card p-4 shadow">
                    <h2 class="text-center mb-4" style="color: #ffcc00;">Iniciar Sesión</h2>
                    
                    <form action="validar.php" method="POST">
                        
                        <div class="mb-3">
                            <label class="form-label">Nombre Completo</label>
                            <input type="text" name="nombre" class="form-control" placeholder="Ej. Alejandro Cruz" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Usuario (Número de Control)</label>
                            <div class="input-group">
                                <input type="text" name="n_control" class="form-control" placeholder="Tu número" required>
                                <span class="input-group-text">@itoaxaca.edu.mx</span>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Contraseña</label>
                            <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-warning fw-bold text-dark">Entrar al Sistema</button>
                        </div>
                    </form>
                    
                    <div class="text-center mt-3">
                        <a href="index.php" class="text-decoration-none" style="color: #ccc; font-size: 0.9em;">← Regresar al inicio</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>

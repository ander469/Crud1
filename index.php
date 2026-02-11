<?php
session_start();

// Si el usuario ya está autenticado, redirigir según su rol
if (isset($_SESSION['user_id']) && isset($_SESSION['role_id'])) {
    if ($_SESSION['role_id'] == 1) {
        header('Location: home/dashboard.php'); // Admin
    } elseif ($_SESSION['role_id'] == 3) {
        header('Location :/dashboardusers.php'); // Usuario normal
    }
    exit; // Detener la ejecución después de redirigir
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Iniciar Sesión - Sistema CRUD</title>
</head>
<body>
    <div class="wrape">
        <div class="title">Iniciar Sesión</div>
        <?php if (isset($_GET['error'])): ?>
            <div style="background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 15px; border-left: 4px solid #f5c6cb;">
                <?php echo htmlspecialchars($_GET['error']); ?>
            </div>
        <?php endif; ?>
        <form action="InicioSesion/InicionSesion.php" method="POST">
            <div class="field">
                <label for="username">Correo Electrónico</label>
                <input type="text" id="username" name="username" required placeholder="ejemplo@correo.com">
            </div>
            <div class="field">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" required placeholder="••••••••">
            </div>
            <div class="content">
                <div class="checkbox">
                    <input type="checkbox" id="remember-me" name="remember">
                    <label for="remember-me">Recordarme</label> 
                </div>
                <div class="pass-link"><a href="recuperar.php">¿Olvidaste tu contraseña?</a></div>
            </div>
            <div class="field">
                <input type="submit" value="Iniciar Sesión">
            </div>
            <div class="signup-link">¿No tienes cuenta? <a href="registrarse.php">Regístrate aquí</a></div>
        </form>
    </div>
</body>
</html>
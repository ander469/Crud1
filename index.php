<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylos.css">
    <title>iniciciar sesion</title>
</head>
<body>
    <div class="wrapper">
        <div class="tittle">Iniciar Sesion</div>
        <form action="regirstrar_usuarios.php" method="POST"></form>
            <div class="field">
                <input type="text" required name="username">
                <label>Correo De Usuario</label>
            </div>
        <div class="field">
            <input type="password" required name="password">
            <label>Contraseña</label>
        </div>
        <div class="content">
            <div class="checkbox">
                <input type="checkbox" id="remember-me">
                <label for="remember-me">Recordarme</label>
            </div>
            <div class="pass-link"><a href="#">Olvidaste tu contraseña?</a></div>
            <div class="signup-link"><a href="registrar_usuarios.php">registro</a></div>
        </div>
        <div class="field">
            <input type="submit" value="Iniciar Sesion">
         </div>
    </div>
</body>
</html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>inicio por roles</title>
</head>
<body>
    <div class="wrape">
        <div class="title">Iniciar Sesion </div>
        <form action="InicioSesion/InicioSesion.php" method="POST">
            <div class="field">
                <input type="text" required name="username" placeholder="Correo Electronico">
                <label for="username">correo del usuario</label>
            </div>
            <div class="field">
                <input type="password" required name="password" placeholder="Contraseña">
                <label>contraseña del usuario</label>
            </div>
            <div class="field">
                <select name="role_id" id="role_id">
                    <option value="1">Administrador</option>
                    <option value="2">Usuario</option>
                    <option value="3">Invitado</option>
                </select>
                <label for="role_id">Selecciona tu rol</label>
            </div>
            <div class="content">
            </div>
            <div class="field">
                <input type="submit" value="Registrarse">
            </div>
            <div class="signup-link">
                Ya tienes una cuenta? <a href="index.php">Inicia sesion ahora</a>
            </div>
        </form>
    </div>
</body>
</html>
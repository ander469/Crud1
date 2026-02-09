<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>
</head>
<body>
    <div class="wrapper">
        <div class="tittle">Registrarse</div>
        <form action="" method="POST"></form>
            <div class="field">
                <input type="text" required name="username">
                <label>Correo De Usuario</label>
            </div>
        <div class="field">
            <input type="password" required name="password">
            <label>Contraseña</label>
        </div>
        <div class="field">
            <select name="role_id" id="role_id" required>
                <option value="">Admin</option>
                <option value="">Usuario</option>
                <option value="">Secretaria</option>
                !-- Aquí puedes agregar las opciones de roles disponibles -->
            </select>
        </div>
        <label for="role_id">rol</label>
    </div>
    <div class="field">
        <input type="submit" value="Registrar">
    </div>
</body>
</html>
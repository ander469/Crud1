<?php 
    require_once 'conection.php';

    $conn = conectar();

    $sql = "SELECT * FROM users";
    $query = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud1</title>
</head>
<body>
    <div>
        <form method="POST" action="insert_user.php">
            <h1>Crear Usuario</h1>

            <input type="text" name="nombre" placeholder="Nombre ">
            <input type="text" name="apellido" placeholder="Apellido">
            <input type="text" name="usuario" placeholder="Usuario">
            <input type="password" name="contraseña" placeholder="Contraseña">
            <input type="email" name="email" placeholder="Email">
             <input type="submit" value="Registrar">
            
             <a href="usuarios.php" class="btn">ver registros</a>    

            

        </form>
    </div>
</body>
</html>
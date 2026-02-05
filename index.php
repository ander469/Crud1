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
        <form action="">
            <h1>Crear Usuario</h1>

            <input type="text" name="nombre" placeholder="Nombre ">
            <input type="text" name="apellido" placeholder="Apellido">
            <input type="text" name="usuario" placeholder="Usuario">
            <input type="text" name="contraseña" placeholder="Contraseña">
            <input type="text" name="email" placeholder="Email">

            <input type="submit" value="Registrar" placeholder="guardar">
            <button onclick="window.location.href='usuarios.php'">registros</button>

            

        </form>
    </div>


</body>
</html>
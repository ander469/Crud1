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
    <title>Usuarios Registrados</title>
</head>
<body>
    <div>
        <h2>Usuarios Registrados</h2>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Username</th>
                    <th>Contraseña</th>
                    <th>Email</th>
                    <!-- estos "th" van vacios -->
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (mysqli_num_rows($query) > 0) {
                        while($row = mysqli_fetch_array($query)) {  
                ?>

                <tr>
                
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellido']; ?></td>
                <td><?php echo $row['usuario']; ?></td>
                <td><?php echo $row['contraseña']; ?></td>
                <td><?php echo $row['email']; ?></td>

                <td><a href="editar.php?id=<?php echo $row['id']; ?>">Editar</a></td>
                    <td><a href="eliminar.php?id=<?php echo $row['id']; ?>" 
                          onclick="return confirm('¿Eliminar este usuario?')">Eliminar</a></td>
                </tr>
                 <?php
                    }
                } else {
                    echo "<tr><td colspan='8'>No hay usuarios</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
<?php
session_start();

// Verifica si el usuario ha iniciado sesión
if (!isset($_SESSION['username'])) {
    header('Location: ../index.php');
    exit;
}

// Verifica que el rol sea usuario normal (3)
if ($_SESSION['role_id'] != 3) {
    // Si es admin, redirige a su panel
    if ($_SESSION['role_id'] == 1) {
        header('Location: dashboard.php');
    } else {
        header('Location: ../index.php');
    }
    exit;
}

// Conectar a la base de datos (ruta corregida)
require_once __DIR__ . '/../config/Connection.php';
$connection = new Connection();
$pdo = $connection->connect();

// Obtener la lista de usuarios (puedes filtrar si es necesario)
$sql = "SELECT id, username FROM usuarios";
$stmt = $pdo->query($sql);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard de Usuario</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap">
</head>
<body>
    <div class="sidebar">
        <h2>Panel de Usuario</h2>
        <a href="dashboardusers.php">Inicio</a>
        <a href="../registro.php">Agregar Usuario</a>
        <a href="../InicioSesion/CerrarSesion.php">Cerrar sesión</a>
    </div>
    <div class="main-content">
        <div class="header">
            <h1>Bienvenido, <?php echo htmlspecialchars($_SESSION['username']); ?></h1>
        </div>
        <div class="user-list">
            <h2>Lista de Usuarios</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de Usuario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($user['id']); ?></td>
                            <td><?php echo htmlspecialchars($user['username']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
<?php
require_once '../config/Connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
    $role_id = $_POST['role_id'];

    try {
        $conexion = new Connection();
        $pdo = $conexion->connect();

        $sql = "INSERT INTO usuarios (username, password, role_id) VALUES (:username, :password, :role_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'username' => $username,
            'password' => $password,
            'role_id' => $role_id
        ]);

        header('Location: ../index.php?success=Registro exitoso, por favor inicia sesión');
        exit(); // Detener la ejecución después de redirigir

    } catch (\Throwable $th) {
        header('Location: ../regirstrarse.php?error=Error al registrar usuario: ' . urlencode($th->getMessage()));
        exit(); // Detener la ejecución después de redirigir
    }


}




?>
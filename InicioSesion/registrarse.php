<?php
require_once "conexion.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role_id = $_POST['role_id'];

    try {
        $conection = new Connection();
        $pdo = $conection->connect();

        $sql = "INSERT INTO users (username, password, role_id) VALUES (:username, :password, :role_id)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'username' => $username,
            'password' => $password,
            'role_id' => $role_id
        ]);

        header('Location: index.php');
        exit();
    } catch (\Throwable $th) {
        echo "Error de conexión: " . $th->getMessage();
    }
}   


?>
<?php
require_once '../crud1/config/Conection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST')  {
    $usernmae = $_POST['username'];
    $password = $_POST['password'];

    try {
        $connection = new Connection();}
        $pdo = $connection->connect();

        $slq = "SELECT * FROM usuarios WHERE username = :username";
        $stmt = $pdo->prepare($slq);
        $stmt->execute(['username' => $usernmae]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
             $_SESSION['username'] = $user['username'];
            $_SESSION['role_id'] = $user['role_id'];

            if ($user['role_id'] == 1 ) {
                header ('location: ../crud1/dashboard.php');
            }elseif ($user['role_id'] == 3) {
                header ('location: ../crud1/dashboardusers.php');
            }else {
                echo "Rol no reconocido";
            }
            exit();
        }else {
            $error_message = 'Credenciales incorrectas';
        }

    } catch (\Throwable $th) {
        $error_message = "Error De Conexion " . $th->getMessage();
            exit;
    }
}
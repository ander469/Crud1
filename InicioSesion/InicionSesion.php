<?php
require_once __DIR__ . '/../config/Connection.php';
session_start();


// Si ya hay sesión activa, redirige según su rol
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role_id'] == 1) {
        header('Location: ../home/dashboard.php');
    } elseif ($_SESSION['role_id'] == 3) {
        header('Location: ../home/dashboardusers.php');
    }
    exit();
}

$error_message = ''; // Variable para mostrar errores en el formulario

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    // Validar que no estén vacíos
    if (empty($username) || empty($password)) {
        $error_message = 'Por favor ingresa usuario y contraseña';
    } else {
        try {
            $connection = new Connection(); 
            $pdo = $connection->connect();

            $sql = "SELECT * FROM usuarios WHERE username = :username";
            $stmt = $pdo->prepare($sql);
            
            $stmt->execute(['username' => $username]);  
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['role_id'] = $user['role_id'];
                $_SESSION['last_login'] = time();

                // Redirigir según el rol
                if ($user['role_id'] == 1) {
                    header('Location: ../home/dashboard.php');
                } elseif ($user['role_id'] == 3) {
                    header('Location: ../home/dashboardusers.php');
                } else {
                    $error_message = 'Rol no reconocido';
                }
                exit();
            } else {
                $error_message = 'Credenciales incorrectas';
            }

        } catch (\Throwable $th) {
            $error_message = "Error de conexión: " . $th->getMessage();
        }
    }
}
?>

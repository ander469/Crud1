<?php
session_start();
require_once __DIR__ . '/../config/Connection.php';

// Redirigir si ya hay sesión activa
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role_id'] == 1) {
        header('Location: ../home/dashboard.php');
        exit;
    } elseif ($_SESSION['role_id'] == 3) {
        header('Location: ../home/dashboardusers.php');
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        header('Location: ../index.php?error=' . urlencode('Por favor ingresa usuario y contraseña'));
        exit;
    }

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

            if ($user['role_id'] == 1) {
                header('Location: ../home/dashboard.php');
            } elseif ($user['role_id'] == 3) {
                header('Location: ../home/dashboardusers.php');
            } else {
                header('Location: ../index.php?error=' . urlencode('Rol no reconocido'));
            }
            exit;
        } else {
            header('Location: ../index.php?error=' . urlencode('Credenciales incorrectas'));
            exit;
        }
    } catch (\Throwable $th) {
        header('Location: ../index.php?error=' . urlencode('Error de conexión: ' . $th->getMessage()));
        exit;
    }
}

// Si alguien accede por GET
header('Location: ../index.php');
exit;
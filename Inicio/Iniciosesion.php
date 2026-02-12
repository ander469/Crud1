<?php
// Activar errores SOLO para depuración (quítalo en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();


require_once __DIR__ . '/../Connection.php';

// 2. Si ya hay sesión activa, redirigir directamente
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['role_id'] == 1) {
        header('Location: ../home/dashboard.php');
        exit;
    } elseif ($_SESSION['role_id'] == 3) {
        header('Location: ../home/dashboardusers.php');
        exit;
    }
}

// 3. Procesar solo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    // Validar campos vacíos
    if (empty($username) || empty($password)) {
        header('Location: ../index.php?error=' . urlencode('Por favor ingresa usuario y contraseña'));
        exit;
    }

    try {
        $conexion = new Connection();
        $pdo = $conexion->connect();

        $sql = "SELECT * FROM usuarios WHERE username = :username";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            // Credenciales correctas
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role_id'] = $user['role_id'];

            if ($user['role_id'] == 1) {
                header('Location: ../home/dashboard.php');
                exit;
            } elseif ($user['role_id'] == 3) {
                header('Location: ../home/dashboardusers.php');
                exit;
            } else {
                header('Location: ../index.php?error=' . urlencode('Rol no reconocido'));
                exit;
            }
        } else {
            // Usuario no encontrado o contraseña incorrecta
            header('Location: ../index.php?error=' . urlencode('Usuario o contraseña incorrectos'));
            exit;
        }
    } catch (\Throwable $th) {
        // Error de conexión o consulta
        header('Location: ../index.php?error=' . urlencode('Error en el sistema. Intente más tarde.'));
        // Para depurar, puedes usar: ?error=' . urlencode($th->getMessage())
        exit;
    }
}

// Si alguien accede por GET, redirigir al login
header('Location: ../index.php');
exit;
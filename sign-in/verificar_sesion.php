<?php
// Iniciar sesión si no está iniciada
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está autenticado
if (!isset($_SESSION['authenticated']) || $_SESSION['authenticated'] !== true) {
    header('Location: sign.php'); // Redirigir a la página de inicio de sesión si no está autenticado
    exit();
}

if (!isset($_SESSION['user_type']) || ($_SESSION['user_type'] !== 'cliente' && $_SESSION['user_type'] !== 'administrador')) {
    // Redirigir a la página de inicio de sesión si el tipo de usuario no es válido
    header('Location: sign.php');
    exit();
}
?>

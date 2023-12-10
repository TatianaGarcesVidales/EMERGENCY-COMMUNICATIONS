<?php
// Datos de conexión
$servername = "localhost";
$username = "id21329370_emergency";
$password = "Emergency_123";
$dbname = "id21329370_emergency";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener los datos del formulario
$modifyType = $_POST['modifyType'];

// Obtener el tipo de usuario original
$oldUserType = $_POST['oldUserType'];

// Obtener los datos específicos del formulario según el tipo de modificación
switch ($modifyType) {
    case 'id':
        $userId = $_POST['modifyUserId'];
        $newUsername = $_POST['modifyUsername'];
        $newEmail = $_POST['modifyEmail'];
        $newPassword = $_POST['modifyPassword'];
        $newUserType = $_POST['modifyTipoUsuario'];
        $updateQuery = "UPDATE usuarios SET nombre_usuario = '$newUsername', correo_electronico = '$newEmail', contrasena = '$newPassword', tipo_usuario = '$newUserType' WHERE id = '$userId'";
        break;
    case 'username':
        $username = $_POST['modifyUsername'];
        $newEmail = $_POST['modifyEmail'];
        $newPassword = $_POST['modifyPassword'];
        $newUserType = $_POST['modifyTipoUsuario'];
        $updateQuery = "UPDATE usuarios SET correo_electronico = '$newEmail', contrasena = '$newPassword', tipo_usuario = '$newUserType' WHERE nombre_usuario = '$username'";
        break;
    case 'email':
        $email = $_POST['modifyEmail'];
        $newUsername = $_POST['modifyUsername'];
        $newPassword = $_POST['modifyPassword'];
        $newUserType = $_POST['modifyTipoUsuario'];
        $updateQuery = "UPDATE usuarios SET nombre_usuario = '$newUsername', contrasena = '$newPassword', tipo_usuario = '$newUserType' WHERE correo_electronico = '$email'";
        break;
    default:
        // Manejar otros tipos de modificación si es necesario
        break;
}

// Añadir líneas para imprimir o registrar datos
error_log("Update Query: " . $updateQuery);

if ($conn->query($updateQuery) === TRUE) {
    echo "Modificación guardada exitosamente.";
} else {
    echo "Error al guardar la modificación: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

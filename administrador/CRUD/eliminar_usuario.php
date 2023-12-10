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
$deleteType = $_POST['deleteType'];

switch ($deleteType) {
    case 'id':
        $userId = $_POST['userId'];
        $deleteQuery = "DELETE FROM usuarios WHERE id = '$userId'";
        break;
    case 'username':
        $username = $_POST['username'];
        $deleteQuery = "DELETE FROM usuarios WHERE nombre_usuario = '$username'";
        break;
    case 'email':
        $email = $_POST['email'];
        $deleteQuery = "DELETE FROM usuarios WHERE correo_electronico = '$email'";
        break;
}

// Ejecutar la consulta de eliminación
if ($conn->query($deleteQuery) === TRUE) {
     echo "<script>
            function mostrarVentanaEmergente() {
              alert('Usuario eliminado con éxito');
              window.location.href = 'formularioEliminarUsuario.html';
            }
            window.onload = mostrarVentanaEmergente;
          </script>";
    
} else {
     echo "<script>
            function mostrarVentanaEmergente() {
              alert('Error al elimnar usuario, inténtalo de nuevo');
              window.location.href = 'formularioEliminarUsuario.html';
            }
            window.onload = mostrarVentanaEmergente;
          </script>";
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

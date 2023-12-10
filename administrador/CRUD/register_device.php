<?php
// Función para generar una dirección MAC aleatoria
function generarDireccionMAC() {
    $mac = '';
    for ($i = 0; $i < 6; $i++) {
        $mac .= sprintf("%02X", mt_rand(0, 255)); // Genera dos dígitos hexadecimales aleatorios
        if ($i < 5) {
            $mac .= ':';
        }
    }
    return $mac;
}

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

// Verificar email en usuarios (Asumiendo que existe una tabla 'usuarios' con una columna 'correo_electronico')
$email = $_POST['email'];
$userExistsQuery = "SELECT id FROM usuarios WHERE correo_electronico = '$email'";
$userExistsResult = $conn->query($userExistsQuery);

//generar direccion mac unica
do {
    $mac = generarDireccionMAC();
    $consulta = "SELECT COUNT(*) as count FROM manillas WHERE codigoDispositivo = '$mac'";
    $resultado = $conn->query($consulta);
    $fila = $resultado->fetch_assoc();
} while ($fila['count'] !== '0');

if ($userExistsResult->num_rows > 0) {
    // El usuario existe
    $userRow = $userExistsResult->fetch_assoc();
    $id_user = $userRow['id'];

    // Insertar datos del formulario en la tabla 'manillas'
    $nombre_persona = $_POST['name'];
    $edad = $_POST['number'];
    $identificacion = $_POST['id_number'];
    $tipo_sangre = $_POST['blood'];

    $insertQuery = "INSERT INTO manillas (codigoDispositivo, id_usuario, nombre_persona, edad, identificacion, tipo_sangre)
        VALUES ('$mac', '$id_user', '$nombre_persona', '$edad', '$identificacion', '$tipo_sangre')";

    if ($conn->query($insertQuery) === TRUE) {
        header("Location: ../../principal/principal.php");
        exit();
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
} else {
    echo "<script>
            function mostrarVentanaEmergente() {
              alert('Usuario no encontrado, verifica los datos ingresados');
              window.location.href = 'formularioEliminarUsuario.html';
            }
            window.onload = mostrarVentanaEmergente;
          </script>";
}
//cerrar la conexión de la base de datos
$conn->close();
?>

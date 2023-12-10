<?php
// Incluir el archivo de conexión
include 'conexion.php';

// Recibir datos desde MATLAB
$identificadorManilla = $_GET['identificadorManilla'];
$latitud = $_GET['latitud'];
$longitud = $_GET['longitud'];

// Mensajes de depuración
echo "Identificador Manilla: " . $identificadorManilla . "<br>";
echo "Latitud: " . $latitud . "<br>";
echo "Longitud: " . $longitud . "<br>";

// Insertar datos en la base de datos
$sql = "INSERT INTO ubicaciones (identificadorManilla, latitud, longitud) VALUES ('$identificadorManilla', $latitud, $longitud)";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>


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

// Mostrar resultados solo si se ha enviado el formulario
$showResults = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $deviceCode = $_POST['deviceCode'];

    // Consulta para eliminar dispositivo por código
    $deleteQuery = "DELETE FROM manillas WHERE codigoDispositivo = '$deviceCode'";
    
    if ($conn->query($deleteQuery) === TRUE) {
        $showResults = true;
        echo "<h3>Dispositivo Eliminado</h3>";
        echo "<p>El dispositivo con código <strong>$deviceCode</strong> ha sido eliminado exitosamente.</p>";
    } else {
        echo "<p>Error al eliminar dispositivo: " . $conn->error . "</p>";
    }
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Estilo del resultado -->
    <style>
        .results {
            text-align: center;
            color: #9ae5f3;
            margin-top: 20px;
        }

        .results p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <!-- Mostrar resultados si es necesario -->
    <?php if ($showResults) : ?>
        <div class="results">
            <script>
                document.getElementById('deleteDeviceForm').classList.add('hidden');
            </script>
        </div>
    <?php endif; ?>
</body>
</html>

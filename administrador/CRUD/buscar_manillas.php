<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dispositivos Encontrados</title>
    <style>
        /* Estilo para el body */
        body {
            background-image: url('/imagenes/cel.jpeg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            background-attachment: fixed;
            width: 100%;
            margin: 0;
            font-size: 18px;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: #f9d6d6;
            margin: 0;
            padding: 0;
        }

        /* Estilo para la tabla */
        /* Estilo para la tabla */
table {
    width: 80%;
    margin: 20px auto;
    border-collapse: collapse;
}

th,
td {
    padding: 10px;
    border: 1px solid #9ae5f3;
    text-align: left;
    color: #000;
    
}

th {
    background-color: #000; /* Cambia este color según tu preferencia */
}


        th,
        td {
            padding: 10px;
            border: 1px solid #9ae5f3;
            text-align: left;
            color: #9ae5f3;
        }

        th {
            background-color: #333;
        }

        /* Estilo para el botón */
        button {
            background-color: #9ae5f3;
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <div class="space">.</div>
    <div class="navbar-nav navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="/index.html">
                    <img src="images/logo30.png" alt="" />
                </a>
            </div>
        </div>
    </div>
    <h2 style="text-align: center; color: #9ae5f3;">Resultado Consulta - Dispositivos Encontrados</h2>
    <form action="buscar_dispositivos.php" method="post" id="searchDevicesForm">
        <!-- ... (resto del formulario) ... -->
    </form>

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
        $searchType = $_POST['searchType'];
        $searchTerm = $_POST['searchTerm'];

        if ($searchType === 'email') {
            // Verificar email en usuarios
            $userExistsQuery = "SELECT id FROM usuarios WHERE correo_electronico = '$searchTerm'";
            $userExistsResult = $conn->query($userExistsQuery);

            if ($userExistsResult->num_rows > 0) {
                // El usuario existe
                $userRow = $userExistsResult->fetch_assoc();
                $id_user = $userRow['id'];

                // Consulta para obtener las manillas del usuario
                $selectQuery = "SELECT * FROM manillas WHERE id_usuario = '$id_user'";
                $result = $conn->query($selectQuery);

                if ($result->num_rows > 0) {
                    // Mostrar los resultados en una tabla
                    $showResults = true;
                    echo "<table>";
                    echo "<thead><tr><th>Código del Dispositivo</th><th>ID del Usuario</th><th>Nombre de la Persona</th><th>Edad</th><th>Identificación</th><th>Tipo de Sangre</th></tr></thead>";
                    echo "<tbody>";
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['codigoDispositivo'] . "</td>";
                        echo "<td>" . $row['id_usuario'] . "</td>";
                        echo "<td>" . $row['nombre_persona'] . "</td>";
                        echo "<td>" . $row['edad'] . "</td>";
                        echo "<td>" . $row['identificacion'] . "</td>";
                        echo "<td>" . $row['tipo_sangre'] . "</td>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                    echo "</table>";

                    // Botón para retroceder
                    echo "<div style=\"text-align: center; margin-top: 20px;\">";
                    echo "<button onclick=\"window.location.href = './formularioBusquedaDispositivo.html';\">Atrás</button>";
                    echo "</div>";
                } else {
                    echo "<p>No hay dispositivos registrados para este usuario.</p>";
                }
            } else {
                echo "<p>Usuario no encontrado.</p>";
            }
        } elseif ($searchType === 'deviceCode') {
            // Consulta para obtener la manilla por código de dispositivo
            $selectQuery = "SELECT * FROM manillas WHERE codigoDispositivo = '$searchTerm'";
            $result = $conn->query($selectQuery);

            if ($result->num_rows > 0) {
                // Mostrar los resultados en una tabla
                $showResults = true;
                echo "<table>";
                echo "<thead><tr><th>Código del Dispositivo</th><th>ID del Usuario</th><th>Nombre de la Persona</th><th>Edad</th><th>Identificación</th><th>Tipo de Sangre</th></tr></thead>";
                echo "<tbody>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['codigoDispositivo'] . "</td>";
                    echo "<td>" . $row['id_usuario'] . "</td>";
                    echo "<td>" . $row['nombre_persona'] . "</td>";
                    echo "<td>" . $row['edad'] . "</td>";
                    echo "<td>" . $row['identificacion'] . "</td>";
                    echo "<td>" . $row['tipo_sangre'] . "</td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";

                // Botón para retroceder
                echo "<div style=\"text-align: center; margin-top: 20px;\">";
                echo "<button onclick=\"window.location.href = './formularioBusquedaDispositivo.html';\">Atrás</button>";
                echo "</div>";
            } else {
                echo "<p>No hay dispositivos registrados con este código de dispositivo.</p>";
            }
        }
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>

</html>

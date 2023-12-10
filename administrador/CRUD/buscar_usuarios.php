<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Encontrados</title>
    <style>
        /* Estilo para el body */
        body {
        background-image: url('/imagenes/manos.png');
        background-size: cover; /* Ajusta el tamaño de la imagen para cubrir el fondo */
    background-position: center center; /* Centra la imagen en el fondo */
     background-repeat: no-repeat; /* Evita que la imagen se repita */
        background-attachment: fixed;
        width: 100%;
        margin: 0;
        font-size: 18px;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        color: #f9d6d6;
            margin: 0;
            padding: 0;
        }

        /* Estilo para los resultados */
        .results {
            text-align: center;
            color: #9ae5f3;
            margin-top: 20px;
        }

        /* Estilo para las etiquetas en los resultados */
        .results p {
            margin-bottom: 10px;
        }

        /* Estilo para el escondido */
        .hidden {
            display: none;
        }

        /* Estilo para la tabla */
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            padding: 10px;
            border: 1px solid #9ae5f3;
            text-align: left;
            color: #9ae5f3;
        }

        th {
            background-color: #333;
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
    <h2 style="text-align: center; color: #9ae5f3;">Resultado Consulta - Usuarios Encontrados</h2>
    <form action="buscar_usuarios.php" method="post" id="searchUsersForm">
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

        if ($searchType === 'username') {
            // Consulta para buscar por nombre de usuario
            $selectQuery = "SELECT * FROM usuarios WHERE nombre_usuario LIKE '%$searchTerm%'";
        } elseif ($searchType === 'email') {
            // Consulta para buscar por correo electrónico
            $selectQuery = "SELECT * FROM usuarios WHERE correo_electronico = '$searchTerm'";
        }

        $result = $conn->query($selectQuery);

        if ($result->num_rows > 0) {
            // Mostrar los resultados en una tabla
            $showResults = true;
            echo "<table>";
            echo "<thead><tr><th>ID</th><th>Nombre de Usuario</th><th>Correo Electrónico</th><th>Tipo de Usuario</th></tr></thead>";
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['nombre_usuario'] . "</td>";
                echo "<td>" . $row['correo_electronico'] . "</td>";
                echo "<td>" . $row['tipo_usuario'] . "</td>";
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
            
           // Contenedor centrado para el botón
    echo "<div style=\"text-align: center; margin-top: 20px;\">";
    echo "<button onclick=\"window.location.href = './formularioBusquedaUsuario.html';\">Atrás</button>";
    echo "</div>";
        } else {
    echo "<script>";
    echo "alert('No se encontraron usuarios.');";
    echo "window.location.href = './formularioBusquedaUsuario.html';";
    echo "</script>";
}
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
    ?>
</body>
</html>
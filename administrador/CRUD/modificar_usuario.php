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

switch ($modifyType) {
    case 'id':
        $userId = $_POST['modifyUserId'];
        $selectQuery = "SELECT * FROM usuarios WHERE id = '$userId'";
        break;
    case 'username':
        $username = $_POST['modifyUsername'];
        $selectQuery = "SELECT * FROM usuarios WHERE nombre_usuario = '$username'";
        break;
    case 'email':
        $email = $_POST['modifyEmail'];
        $selectQuery = "SELECT * FROM usuarios WHERE correo_electronico = '$email'";
        break;
    case 'contrasena':
        $email = $_POST['modifyContrasena'];
        $selectQuery = "SELECT * FROM usuarios WHERE contrasena = '$contrasena'";
        break;
    case 'tipoUsuario':
        $tipoUsuario = $_POST['modifyTipoUsuario'];
        $selectQuery = "SELECT * FROM usuarios WHERE tipo_usuario = '$tipoUsuario'";
        
        
}

$result = $conn->query($selectQuery);

if ($result && $result->num_rows > 0) {
    // Mostrar los resultados y permitir la modificación
    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $oldUsername = $row['nombre_usuario'];
        $oldEmail = $row['correo_electronico'];
        $oldPassword = $row['contrasena'];
        $oldUserType = $row['tipo_usuario'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Usuario</title>
    <style>
        /* Estilo para el body */
        body {
         background-image: url('/imagenes/reset.png');
        background-size:cover;
        background-position: center center; /* Centra la imagen en el fondo */
        background-attachment: fixed;
        width: 100%;
        margin: 0;
        font-size: 18px;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        color: #f9d6d6;
      }

        /* Estilo para el espacio */
        .space {
            margin-bottom: 70px;
        }

        /* Estilo para la barra de navegación */
        .navbar-nav {
            background-color: #19191a;
        }

        .navbar-inverse .navbar-brand {
            color: #9ae5f3;
        }

        .navbar-inverse .navbar-toggle .icon-bar {
            background-color: #9ae5f3;
        }

        /* Estilo para el formulario */
        form {
            width: 60vw;
            max-width: 500px;
            min-width: 300px;
            margin: 0 auto;
            padding-left: 20px;
            padding-right: 20px;
            border-radius: 10px;
            background-color: #373739;
        }

        fieldset {
            border: none;
            padding: 1rem 0;
        }

        input, select {
            margin: 10px 0 0 0;
            width: 100%;
            min-height: 2em;
            font-size: 16px;
            border-radius: 8px;
            background-color: #f9d6d6;
            color: #1F1D36;
        }

        input[type="submit"] {
            border-radius: 2px;
            background-color: #9ae5f3;
            box-shadow: 0 0 5px 5px #9ae5f3;
            margin-bottom: 20px;
        }

        input[type="submit"]:hover {
            border-radius: 2px;
            background-color: #020202;
            color: #9ae5f3;
            box-shadow: 0 0 5px 5px #020202;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 0.5rem 0;
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
<h2 style="text-align: center; color: #9ae5f3;">Modificar Usuario</h2>

<form action="modificaciones.php" method="post">
    <!-- Agrega el campo modifyType al formulario -->
    <input type="hidden" name="modifyType" value="<?php echo $modifyType; ?>">

    <label for="modifyUsername">Nombre de Usuario:</label>
    <input type="text" name="modifyUsername" id="modifyUsername" value="<?php echo $oldUsername; ?>" placeholder="Ingresa el nuevo nombre de usuario">

    <label for="modifyEmail">Correo Electrónico:</label>
    <input type="email" name="modifyEmail" id="modifyEmail" value="<?php echo $oldEmail; ?>" placeholder="Ingresa el nuevo correo electrónico">

    <label for="modifyPassword">Contraseña:</label>
    <input type="password" name="modifyPassword" id="modifyPassword" placeholder="Ingresa la nueva contraseña">

   <!-- Agrega el campo para el tipo de usuario original -->
<input type="hidden" name="oldUserType" value="<?php echo $oldUserType; ?>">

<!-- Campo para el nuevo tipo de usuario -->
<label for="modifyTipoUsuario">Nuevo Tipo de Usuario:</label>
<select name="modifyTipoUsuario" id="modifyTipoUsuario">
    <option value="admin" <?php echo ($oldUserType === 'admin') ? 'selected' : ''; ?>>Admin</option>
    <option value="user" <?php echo ($oldUserType === 'user') ? 'selected' : ''; ?>>Usuario</option>
</select>

    <input type="submit" value="Guardar Modificación">
</form>
</body>
</html>

<?php
} else {
    echo "<script>
            function mostrarVentanaEmergente() {
              alert('No se encontraron usuarios para modificar');
              window.location.href = 'formularioModificarUsuario.html';
            }
            window.onload = mostrarVentanaEmergente;
          </script>";
    }


// Cerrar la conexión a la base de datos
$conn->close();
?>

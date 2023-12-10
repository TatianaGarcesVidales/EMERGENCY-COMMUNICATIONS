<?php
// Incluimos el archivo de conexión
require_once "../includes/conexion.php";

// Verificamos si se ha enviado el formulario de manera segura
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["correo_electronico"]) && isset($_POST["contrasena"])) {

  // Obtenemos y limpiamos los datos del formulario
  $correo = $conn->real_escape_string($_POST["correo_electronico"]);
  $contrasena = $conn->real_escape_string($_POST["contrasena"]);

  // Consulta SQL utilizando declaraciones preparadas para prevenir la inyección SQL
  $consulta = "SELECT id, nombre_usuario, tipo_usuario FROM usuarios WHERE correo_electronico= ? AND contrasena = ? LIMIT 1";
   
  // Preparamos la consulta
  $stmt = $conn->prepare($consulta);

  // Asociamos los parámetros y ejecutamos la consulta
  $stmt->bind_param("ss", $correo, $contrasena);

  // Verificamos si la consulta se ejecuta correctamente
  $querySuccess = $stmt->execute();
     
  if (!$querySuccess) {
    echo "Error en la consulta: " . $stmt->error;
  } else {
    // Obtenemos el resultado
    $stmt->store_result();

    // Verificamos si se encontró al menos un usuario
    if ($stmt->num_rows > 0) {
      // Obtenemos los datos del usuario
      $stmt->bind_result($id_usuario, $nombre_usuario, $tipo_usuario);
      $stmt->fetch();

      // Inicio de sesión exitoso
      session_start();
      $_SESSION["id_usuario"] = $id_usuario;
      $_SESSION["nombre_usuario"] = $nombre_usuario;
      $_SESSION["tipo_usuario"] = $tipo_usuario;

      // Redirigir según el tipo de usuario
      if ($tipo_usuario === 'administrador') {
        header("Location: /administrador/index.html");
      } elseif ($tipo_usuario === 'cliente') {
        header("Location: /principal/principal.php");
      } else {
        // Manejar otros tipos de usuario si es necesario
        echo "Tipo de usuario no reconocido.";
      }
    } else {
      // Inicio de sesión fallido
      $error_message = 'Error: Usuario o contraseña incorrectos';

      // Muestra la ventana emergente con el mensaje de error
     echo "<script>
            function mostrarVentanaEmergente() {
              alert('$error_message');
              window.location.href = 'sign.php';
            }
            window.onload = mostrarVentanaEmergente;
          </script>";
    }

    // Cerramos la consulta preparada
    $stmt->close();
  }

} else {
  // Acceso no autorizado
  header("HTTP/1.1 401 Unauthorized");
  exit();
}

// Cerramos la conexión a la base de datos
$conn->close();
?>

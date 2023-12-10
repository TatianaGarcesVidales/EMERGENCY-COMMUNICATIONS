<?php
    
    //Datos de conexión
    $servername = "localhost";
    $username = "id21329370_emergency";
    $password = "Emergency_123";
    $dbname = "id21329370_emergency";

    //Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Verificar conexión
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    //Insertar datos del formulario en la tabla
    $sql = "INSERT INTO usuarios (nombre_usuario, correo_electronico, contrasena, tipo_usuario)
            VALUES ('$_POST[nombre_usuario]', '$_POST[correo_electronico]', '$_POST[contrasena]', '$_POST[tipo_usuario]')";

    if ($conn->query($sql) === TRUE) {
        // Registro exitoso, redirige y muestra mensaje
        echo '<script>alert("Usuario registrado con éxito."); window.location.href = "/administrador/index.html";</script>';
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
?>
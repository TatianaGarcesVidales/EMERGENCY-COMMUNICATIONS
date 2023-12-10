<?php
// Constante para el nombre de la base de datos
define("DB_NAME", "id21329370_emergency");

// Código de conexión
$servidor = "localhost";
$usuario = "id21329370_emergency";
$contrasena = "Emergency_123";

$conn = new mysqli($servidor, $usuario, $contrasena, DB_NAME);

// Verifica la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


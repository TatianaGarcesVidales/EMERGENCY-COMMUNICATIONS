<?php
// Incluye el archivo que contiene la función
require './codigoU.php';

// Genera un UUID
$uuidGenerado = generarUUID();

// Utiliza del UUID 
echo "UUID generado: " . $uuidGenerado;
?>

<?php
require 'vendor/autoload.php';

use Ramsey\Uuid\Uuid;

function generarUUID() {
    $uuid = Uuid::uuid4();

    return $uuid->toString();
}

// Uso:
$uuidGenerado = generarUUID();
echo "UUID generado: " . $uuidGenerado;
?>

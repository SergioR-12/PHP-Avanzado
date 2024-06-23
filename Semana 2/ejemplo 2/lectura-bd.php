<?php

// Conectarse a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'phpavanzado');

// Verificar errores
if ($conexion->connect_error != null) {
    echo "Ocurrió un error: {$conexion->connect_error}";
}

// consultas a la base de datos
$resultado = $conexion->query("SELECT nombre, correoe, telefono FROM inscripciones");

// Verificar errores
if ($conexion->error != '') {
    echo "Ocurrió un error: {$conexion->error}";
}

// Mostrar los datos de la base de datos 
// Nota: La variable $resultado nos devolverá un array de tipo mysqli_result)

$datos = $resultado->fetch_assoc();
while ($datos != null) {
    echo "<ul>";
    echo "<li>{$datos['nombre']}</li>";
    echo "<li>{$datos['correoe']}</li>";
    echo "<li>{$datos['telefono']}</li>";
    echo "</ul>";
    $datos = $resultado->fetch_assoc();
}


// Cerrar la conexión a la base de datos
$conexion->close();

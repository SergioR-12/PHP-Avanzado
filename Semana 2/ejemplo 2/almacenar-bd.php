<?php

// Conectarse a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'phpavanzado');

// Verificar errores
if ($conexion->connect_error != null) {
    echo "Ocurrió un error: {$conexion->connect_error}";
}

// Insertar datos en la base de datos
$conexion->query("INSERT INTO inscripciones(nombre, correoe, telefono)
                VALUES ('{$_POST['nombre-completo']}', 
                '{$_POST['correoe']}', '{$_POST['telefono-principal']}')");

// Verificar errores
if ($conexion->error != null) {
    echo "Ocurrió un error: {$conexion->error}";
} else {
    echo "Inscripción exitosa.";
}

// Cerrar la conexión a la base de datos
$conexion->close();

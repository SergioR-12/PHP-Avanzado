<?php

// Conectarse a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'tienda');

// Verificar errores
if ($conexion->connect_error != null) {
    echo "Ocurrió un error: {$conexion->connect_error}";
}

// Insertar datos en la base de datos
$conexion->query("INSERT INTO productos(nombre, detalle, imagen, precio)
                VALUES ('bola futbol', 'balon de futbol', 'bola_futbol.png', 5000)");

$conexion->query("INSERT INTO productos(nombre, detalle, imagen, precio)
                VALUES ('tacos', 'tacos de futbol', 'tacos_futbol.png', 15000)");

$conexion->query("INSERT INTO productos(nombre, detalle, imagen,precio)
                VALUES ('pantalon', 'pantalon de ciclismo', 'pantalon_ciclismo.png', 5000)");

$conexion->query("INSERT INTO productos(nombre, detalle, imagen,precio)
                VALUES ('camisa', 'camisa de ciclismo', 'camisa_ciclismo.png', 4000)");

$conexion->query("INSERT INTO productos(nombre, detalle, imagen,precio)
                VALUES ('zapatos', 'zapatos de ciclismo', 'zapatos_ciclismo.png', 15000)");

$conexion->query("INSERT INTO productos(nombre, detalle, imagen, precio)
                VALUES ('casco', 'casco de ciclismo', 'casco_ciclismo.png', 10000)");

$conexion->query("INSERT INTO productos(nombre, detalle, imagen, precio)
                VALUES ('raqueta', 'raqueta de tenis', 'raqueta.png', 8000)");

$conexion->query("INSERT INTO productos(nombre, detalle, imagen, precio)
                VALUES ('guantes de boxeo', 'guantes de boxeo profesionales', 'guantes_boxeo.png', 7000)");

$conexion->query("INSERT INTO productos(nombre, detalle, imagen, precio)
                VALUES ('patineta', 'patineta de skate', 'patineta.png', 9000)");

$conexion->query("INSERT INTO productos(nombre, detalle, imagen, precio)
                VALUES ('bola baloncesto', 'bola oficial de baloncesto', 'bola_baloncesto.png', 6000)");

// Cerrar la conexión a la base de datos
$conexion->close();
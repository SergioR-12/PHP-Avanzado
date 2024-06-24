<?php

// Conectarse a la base de datos desde la clase Conexion.php

spl_autoload_register(function($clase) {
    include("$clase.php");
});

$conexion = new Conexion();

// Crear la base de datos


// Insertar datos en la tabla productos de la base de datos

$conexion->insertarProductos('bola futbol', 'balon de futbol', 'bola_futbol.png', 5000);
$conexion->insertarProductos('tacos', 'tacos de futbol', 'tacos_futbol.png', 15000);
$conexion->insertarProductos('pantalon', 'pantalon de ciclismo', 'pantalon_ciclismo.png', 5000);
$conexion->insertarProductos('camisa', 'camisa de ciclismo', 'camisa_ciclismo.png', 4000);
$conexion->insertarProductos('zapatos', 'zapatos de ciclismo', 'zapatos_ciclismo.png', 15000);
$conexion->insertarProductos('casco', 'casco de ciclismo', 'casco_ciclismo.png', 10000);
$conexion->insertarProductos('raqueta', 'raqueta de tenis', 'raqueta.png', 8000);
$conexion->insertarProductos('guantes de boxeo', 'guantes de boxeo profesionales', 'guantes_boxeo.png', 7000);
$conexion->insertarProductos('patineta', 'patineta de skate', 'patineta.png', 9000);
$conexion->insertarProductos('bola baloncesto', 'bola oficial de baloncesto', 'bola_baloncesto.png', 6000);


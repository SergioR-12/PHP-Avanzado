<?php
    // Conectarse a la base de datos
    $conexion = new mysqli('localhost', 'root', '', 'tienda');

    // Verificar errores
    if ($conexion->connect_error != null) {
        echo "Ocurrió un error: {$conexion->connect_error}";
    }

    // Consultar datos de la base de datos
    $resultado = $conexion->query("SELECT nombre, detalle, imagen, precio FROM productos");

    // Verificar errores
    if ($conexion->error != '') {
        echo "Ocurrió un error: {$conexion->error}";
    }

    // Mostrar los datos de la base de datos
    $datos = $resultado->fetch_assoc();
    
    while ($datos != null) {
        echo "<div class='product'>";
        echo "<img src='img/{$datos['imagen']}' alt='imagen'>";
        echo "<div class='product-details'>";
        echo "<h2>{$datos['nombre']}</h2>";
        echo "<p>{$datos['detalle']}</p>";
        echo "<span>¢ {$datos['precio']}</span>";
        echo "</div>";
        echo "</div>";
        $datos = $resultado->fetch_assoc();
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
?>
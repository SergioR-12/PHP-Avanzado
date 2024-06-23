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
        echo "<span> ¢ ". number_format($datos['precio'], 2) . "</span>";
        echo "<br>";
        echo "<form action='carrito.php' method='post'>";
        echo "<input type='hidden' name='nombre' value='{$datos['nombre']}'>";
        echo "<input type='hidden' name='imagen' value='{$datos['imagen']}'>";
        echo "<input type='hidden' name='precio' value='{$datos['precio']}'>";
        echo "<button type='submit' name='agregar' class='boton'>Agregar</button>";
        echo "</form>";
        echo "</div>";
        echo "</div>";
        $datos = $resultado->fetch_assoc();
    }

    // Cerrar la conexión a la base de datos
    $conexion->close();
?>
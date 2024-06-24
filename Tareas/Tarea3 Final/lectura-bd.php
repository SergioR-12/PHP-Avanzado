<?php
    // Conectarse a la base de datos desde la clase Conexion.php
    spl_autoload_register(function($clase) {
        include("$clase.php");
    });

    $conexion = new Conexion();

    // Mostrar los datos de la tabla productos
    $resultado = $conexion->mostrarProductos();

    // Mostrar los datos de la base de datos
    $datos = $resultado->fetch_assoc();
    
    if ($datos != null) {
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
    } else {
        include 'insertar-bd.php';
        header('Location: index.php');
    }
?>
<?php
    session_start();

    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    spl_autoload_register(function($clase) {
        include("$clase.php");
    });

    $conexion = new Conexion();
    $conexion->crearTablaProductos();

    


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Productos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        
        <div class="botones">
            <button onclick="location.href='consultas.php'" class="boton3">Consultas</button>
            <button onclick="location.href='carrito.php'" class="boton2">Ver Carrito (<?php echo count($_SESSION['carrito']); ?>)</button>
        </div>        
        
        <h1>Lista de Productos</h1>

        <div class="product-list">
            <?php include 'lectura-bd.php'; ?>
        </div>
    </div>
</body>
</html>



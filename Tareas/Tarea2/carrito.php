<?php
    session_start();

    // Verificar si existe la sesión del carrito, si no, crearla
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Verificar si se ha enviado el formulario de agregar
    if (isset($_POST['agregar'])) {
        $nombre = $_POST['nombre'];
        $precio = $_POST['precio'];
        $imagen = $_POST['imagen'];

        $producto = [
            'nombre' => $nombre,
            'precio' => $precio,
            'imagen' => $imagen,
            'cantidad' => 1
        ];

        // Verificar si el producto ya existe en el carrito
        foreach ($_SESSION['carrito'] as $indice => $carrito) {
            if ($carrito['nombre'] == $nombre) {
                $_SESSION['carrito'][$indice]['cantidad']++;
                header('Location: home.php');
                exit;
            }
        }

        
        // Agregar el producto al arreglo de carrito en sesión
        $_SESSION['carrito'][] = $producto;

        // Seguir en la misma página
        header('Location: home.php');
        exit;
    }

    // calcular el total del carrito
    $total = 0;
    foreach ($_SESSION['carrito'] as $producto) {
        $total += $producto['precio'] * $producto['cantidad'];
    }
    $total = number_format($total, 2);


    // borrar el carrito
    if (isset($_POST['vaciar'])) {
        $_SESSION['carrito'] = [];
        header('Location: home.php');
        exit;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container" style="background-color: antiquewhite;">
        
        <h1>Carrito de Compras</h1>
        <br>
        <div class="product-list">
            <?php 
                if (count($_SESSION['carrito']) == 0) {
                    echo "<h2 style='font-weight: bold; font-size: 1.5rem;'>No hay productos en el carrito</h2>";
                } else {
                    $carrito = $_SESSION['carrito'];
                    foreach ($carrito as $producto) {
                        echo "<div class='product'>";
                        echo "<img src='img/{$producto['imagen']}' alt='imagen'>";
                        echo "<div class='product-details'>";
                        echo "<h2>{$producto['nombre']}</h2>";
                        echo "<span> ¢ ". number_format($producto['precio'], 2) . "</span>";
                        echo "<br><br>";
                        echo "<p style='text-align: right;'>Cantidad: {$producto['cantidad']}</p>";
                        echo "<p style='text-align: right;'>Subtotal: ¢ ". number_format($producto['precio'] * $producto['cantidad'], 2) . "</p>";
                        echo "</div>";
                        echo "</div>";
                    } 
                }
                  
            ?>
        </div>

        <br>
        <hr>
        <h2 style="text-align: right; margin: 0 20px 20px; font-size: 2rem;">Total: <span>¢ <?php echo $total; ?></span></h2>
        <hr>
        <button style="margin-left: 0px;" class="boton2" onclick="location.href='home.php'">Seguir comprando</button>
        <form method="post">
            <button type="submit" name="vaciar" class="boton">Vaciar carrito</button>
        </form>
    </div>
</body>
</html>



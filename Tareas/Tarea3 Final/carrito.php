<?php
    session_start();

    // Verificar si existe la sesión del carrito, si no, crearla
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Verificar si se ha enviado el formulario del botón agregar de cada producto en la pagina de inicio
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

        // Seguir en la misma página de inicio
        header('Location: home.php');
        exit;
    }

    // calcular el total del carrito y darle formato
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

    // mostrar pantalla al darle click en finalizar el detalle de los articulos comprados y el total

    if (isset($_POST['finalizar'])) {
        // Verificar que el carrito no este vacio
        if (count($_SESSION['carrito']) == 0) {
            echo '<script> alert(" No hay productos en el carrito"); </script>';
            echo '<script> location.href="carrito.php"; </script>';

        } 
        // Si el carrito no esta vacio
        else {
            echo "<!DOCTYPE html>
            . <html lang='es'>
            . <head>
            .    <meta charset='UTF-8'>
            .    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            .    <title>Detalle Compra</title>
            .    <link rel='stylesheet' href='style.css'>
            . </head>
            . <body>
            . <div class='container'>
            . <h1>Detalle de compra</h1>
            . <br><br>
            . <table>
            . <tr>
            . <th>Producto</th>
            . <th>Precio</th>
            . <th>Cantidad</th>
            . <th>Subtotal</th>
            . </tr>";

            // recorrer el carrito y mostrar los productos en la tabla
            foreach ($_SESSION['carrito'] as $producto) {
                echo "<tr style='text-transform: capitalize;'>";
                echo "<td>" . $producto['nombre'] . "</td>";
                echo "<td style='text-align: right;'>¢ " . number_format($producto['precio'], 2) . "</td>";
                echo "<td style='text-align: center;'>" . $producto['cantidad'] . "</td>";
                echo "<td style='text-align: right;'>¢ " . number_format($producto['precio'] * $producto['cantidad'], 2) . "</td>";
                echo "</tr>";
            }

            echo "</table>
            . <br>
            . <hr>
            . <h2 style='text-align: right; margin: 0 10px 0 0; font-size: 2rem;'>Total: <span>¢ ". $total . "</span></h2>
            . <hr>
            . <br>
            . <h1 style='font-weight: bold; font-size: 2.5rem; text-align: center; color: green; background-color: white; text-shadow: none'>Gracias por su compra</h1>
            . <br><br>";
            echo "<button class='boton' onclick='location.href=\"home.php\"' style='display: block;margin: 10px auto;'><a>Volver a inicio</a></button>
            . </div>";

            // borra el carrito dado que el usuario finalizó la compra
            $_SESSION['carrito'] = [];
        }
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
    <div class="container">
        
        <h1>Carrito de Compras</h1>
        <br>
        <div class="product-list">

            <!-- mostrar productos en el carrito -->
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

        <!-- mostrar botones para seguir comprando, finalizar la compra o vaciar carrito -->

        <div class="botones">
            <button class="boton2" onclick="location.href='home.php'" style ="flex:none">Seguir comprando</button>
            <form method="post" style="display: flex; justify-content: space-between;">
                <button type="submit" name="vaciar" class="boton" style ="flex:none">Vaciar carrito</button>
            </form>
            <form method="post" style="display: flex; justify-content: space-between;">
                <button type="submit" name="finalizar" class="boton3" style ="flex:none">Finalizar compra</button>
            </form>
        </div>
    </div>
</body>
</html>



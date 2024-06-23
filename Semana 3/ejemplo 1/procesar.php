<?php

    $servicios = [false, false, false];
    $descripciones = ['Cambio de aceite', 'Rotación de llantas', 'Limpieza de inyectores'];
    
    if (isset($_POST['servicios'])) {
        $datos = $_POST['servicios'];

        foreach ($datos as $dato) {
            $servicios[$dato] = true;
        }
    }

    setcookie( "servicios", implode(";", $servicios));

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección</title>
</head>
<body>

    <h1>Los servicios seleccionados son:</h1>

    <ul>
        <?php
            foreach ($servicios as $indice => $servicio) {
                if ($servicio) {
                    echo "<li>{$descripciones[$indice]}</li>";
                }
            }
        ?>
    </ul>

    <a href="mantenimiento.php">&lt;=Regresar</a>
    <a href="#">Finalizar orden</a>

</body>
</html>
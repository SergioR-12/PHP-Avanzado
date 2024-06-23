<?php

    function obtenerIntereses($valor) {
        $texto = "valor incorrecto";
        if($valor == 1) {
            $texto = "Html5";
        } elseif($valor == 2) {
            $texto = "C++";
        } elseif($valor == 3) {
            $texto = "Java";
        } elseif($valor == 4) {
            $texto = "Python";
        }

        return $texto;
    }

    function obtenerRegion($valor) {
        $texto = "valor incorrecto";
        if($valor == 1) {
            $texto = "Area Metropolitana";
        } elseif($valor == 2) {
            $texto = "Zona Norte";
        } elseif($valor == 3) {
            $texto = "Zona Sur";
        }

        return $texto;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado</title>
</head>
<body>
    <h1>Resultado del procesamiento</h1>
    <p>Nombre: <?= $_POST['nombre-completo'] ?></p>
    <p>Teléfono: <?= $_POST['telefono-principal'] ?></p>
    <p>Intereses:</p>

    <ul>
        <?php
            foreach ($_POST['intereses'] as $interes) {
                echo "<li>".obtenerIntereses($interes)."</li>";
            }
        ?>
    </ul>
    <p>Región: <?= obtenerRegion($_POST['region'])?></p>

</body>
</html>


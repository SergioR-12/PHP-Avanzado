<?php

    session_start();

    $_SESSION['usuario'] = "Sergio";

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo</title>
</head>
<body>
    <?php
        // Esto se genera en el servidor
        echo "<script>
                sessionStorage.setItem('tema', 'Almacenamiento en sessionStorage');
            </script>";
    ?>
    
    <button onclick="alert('Los datos son: ' + sessionStorage.getItem('tema'))">Ver Datos</button>
</body>
</html>
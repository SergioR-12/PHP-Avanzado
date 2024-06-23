<?php

    session_start();

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
                localStorage.setItem('tema', 'Almacenamiento en localStorage');
                localStorage.setItem('apellido', 'Rodríguez');
                localStorage.setItem('areglo', '[1,2,3]');
            </script>";
    ?>

    <button onclick="alert('Los datos son: ' + localStorage.getItem('tema'))">Ver Datos</button>

    <hr>

    <?php
        echo "El valor registrado en la sesión es: {$_SESSION['usuario']}";
    ?>

</body>
</html>
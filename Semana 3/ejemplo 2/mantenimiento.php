<?php
    session_start();

    if(isset($_COOKIE['servicios'])) {
        $servicios = $_SESSION['servicios'];
    } else {
        $servicios = [false, false, false];
    }
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantenimiento Vehicular (session)</title>
</head>
<body>
    <h1>Mantenimiento Vehicular (session)</h1>

    <p>Por favor, seleccione los servicios de mantenimiento
    que desea aplicar en su revisión.</p>

    <form action="procesar.php" method="post">
        <div>
            <input id="aceite" type="checkbox" name="servicios[]" value="0" <?= $servicios[0] ? 'checked' : ''; ?>>
            <label for="aceite">Cambio de aceite</label>
        </div>
        <div>
            <input id="llantas" type="checkbox" name="servicios[]" value="1" <?= $servicios[1] ? 'checked' : ''; ?>>
            <label for="llantas">Rotación de llantas</label>
        </div>
        <div>
            <input id="inyec" type="checkbox" name="servicios[]" value="2" <?= $servicios[2] ? 'checked' : ''; ?>>
            <label for="inyec">Limpieza de inyectores</label>
        </div>
        <br>
        <button>Continuar</button> 
        &nbsp;&nbsp;
        <a href="cerrar.php">Cerrar sesión</a>
    </form>
</body>
</html>
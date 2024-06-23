<?php

    session_start();
    $nombre = session_name();
    $parametros = session_get_cookie_params();
    setcookie($nombre, '', 1, $parametros['path']);
    session_destroy();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión destruida</title>
</head>
<body>

    <h1>Sesión destruida</h1>

    <a href="mantenimiento.php">&lt;=Regresar</a>
</body>
</html>
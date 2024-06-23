<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Segundo Framework PHP MVC</title>
</head>
<body>
    <?php
        if(isset($_GET['controller']) && isset($_GET['action']))
        {
            $controller = $_GET['controller'];
            $action = $_GET['action'];
        } 
        else
        {
            $controller = 'principal';
            $action = 'home';
        }

        require_once("rutas.php");
    ?>
</body>
</html>
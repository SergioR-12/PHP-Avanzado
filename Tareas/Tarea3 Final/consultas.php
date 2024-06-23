<?php
    spl_autoload_register(function($clase) {
        include("$clase.php");
    });

    $conexion = new Conexion();
    $conexion->crearTablaConsultas();

    if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $correo = $_POST['correo'];
        $consulta = $_POST['consulta'];

        $conexion->insertarConsulta($nombre, $correo, $telefono, $consulta);

        echo '<script> alert("Se ha enviado la consulta"); </script>';
    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <h1>Consultas</h1>

        <form action="consultas.php" method="POST">
            
            <div class="container" style="background-color: white;">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                    <br><br>
                    <label for="telefono">Teléfono</label>
                    <input type="text" name="telefono" id="telefono">
                    <br><br>
                    <label for="correo">Correo</label>
                    <input type="email" name="correo" id="correo">
                    <br><br>
                    <label for="consulta">Consulta</label>
                    <br>
                    <textarea name="consulta" id="consulta" cols="40" rows="5"></textarea>
                    <br><br>
                    <input type="submit" value="Enviar" name="enviar" class="boton3">
            </div>

        </form>

        <button class="boton2" onclick="location.href='home.php'" style="display: block;margin: 10px auto;"><a>Volver a inicio</a></button>

    </div>

</body>
</html>
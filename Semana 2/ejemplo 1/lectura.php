<?php

    // 1. Abrir el archivo
    $archivo = fopen('archivo', 'r');

    // 2. Leer el archivo
    $linea = fgets($archivo);

    while ($linea != null) {
        //var_dump($linea);
        $datos = explode(',', $linea);
        var_dump($datos);
        echo '<br>';
        $intereses = substr($datos[2], 1, strlen($datos[2])-3);
        $datosInteres = explode('|', $intereses);
        var_dump($datosInteres);
        echo '<br>';
        $linea = fgets($archivo);
    }

    $contenido = file_get_contents('archivo');
    var_dump($contenido);
<?php

    // var_dump($_POST);
    
    $archivo = fopen('archivo', 'a');

    $intereses = '(';
    foreach ($_POST['intereses'] as $interes) {
        $intereses .= $interes.'|';
    }
    $intereses .= ')';

    $datos = "{$_POST['nombre-completo']},{$_POST['telefono-principal']},$intereses,{$_POST['region']}\n";

    fwrite($archivo, $datos);

    fclose($archivo);




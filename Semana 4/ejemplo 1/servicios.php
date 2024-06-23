<?php
    spl_autoload_register(function ($clase) {
        include("clases/$clase.php");
    });

    include('inclusiones/precios.php');
    include('inclusiones/formateador.php');

    $losPrecios = [50000,75000,100000];
    echo 'El precio final de los servicios es ' . formatearPrecio2Dec(calcularPrecioFinal($losPrecios));
    echo '<br>';
    echo 'El precio promedio de los servicios es ' . formatearPrecio2Dec(promedio($losPrecios));
    echo '<hr>';

    $miClase = new MiClase();
    $miClase->saludar();


?>
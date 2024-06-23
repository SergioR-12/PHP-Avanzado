<?php

    include('inclusiones/precios.php');
    include('inclusiones/formateador.php');

    $losPrecios = [4567,1234,4568];
    echo 'El precio es ' . formatearPrecio2Dec(calcularPrecioFinal($losPrecios));

?>
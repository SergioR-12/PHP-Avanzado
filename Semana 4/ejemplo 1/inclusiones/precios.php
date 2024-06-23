<?php

    function calcularPrecioFinal($precios) {
        $sumatoria = 0;
        foreach ($precios as $precio) {
            $sumatoria += $precio;
        }
        return $sumatoria;
    }

    function promedio($precios) {
        $promedio = 0;
        $promedio = calcularPrecioFinal($precios);       
        return $promedio / count($precios);
    }


?>
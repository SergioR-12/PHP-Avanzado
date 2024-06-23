<?php
    
    function formatearPrecio2Dec($precio) {
        $precio = number_format($precio, 2, '.', ',');
        return "¢ $precio";
    }
    
?>
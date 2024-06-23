<?php
    require_once("../models/elModelo.php");
    // echo "Se llama al modelo\n";
    $instanciaClase = new claseModelo;
    // echo "Modelo instanciado\n";

    // echo "Se fija nombre\n";
    $instanciaClase->FijaNombre("John");
    // echo "Se fija apellido\n";
    $instanciaClase->FijaApellido("Wick");
    // echo "Se retorna nombre completo\n";
    $elNombreFinal = $instanciaClase->FijaNombreCompleto();

    // echo "Se llama a la vista\n \n";

    require_once("../views/laVista.php");
?>
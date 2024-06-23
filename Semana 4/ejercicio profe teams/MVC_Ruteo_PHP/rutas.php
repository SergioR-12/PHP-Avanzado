<?php

function call($controller, $action) {
    require_once('controllers/' . $controller . '_Controlador.php');

    switch ($controller) {
        case 'principal':
                $controller = new principalController();
            break;
        
        default:
            $controller = new principalController();
            $action = 'error';
            break;
    }

    $controller->{$action}();
}

$controllers = array('principal' => ['home', 'error']);

if (array_key_exists($controller, $controllers))
{
    if(in_array($action, $controllers[$controller]))
    {
        //LLAMADA AL CONTROLLER CON LA ACTION
        call($controller, $action);
    }else{
        //devolver un error que no existe la action
        call($controller, 'error');
    }
}else{
    //devolver un error que no existe el controller
    call('principal', 'error');
}

?>
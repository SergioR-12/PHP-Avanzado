<?php
    
    try {
        error_reporting(E_ALL ^ E_WARNING); // Elimina los warnings. La otra forma es modificar el archivo php.ini
        // no deberían mostrarse los warnings en producción

        $conexion = new mysqli("localhost", "root", "", "phpavanzado");
        

        if ($conexion->connect_error) {
            echo "Ocurrio un error al establecer la conexion: " . $conexion->connect_error;
            throw new Exception("Ocurrio un error:  {$conexion->connect_error}");
        }

        echo "Conectado";
        echo "<hr>";

        if (!file_exists("prueba.txt")) {
            throw new Exception("No existe el archivo");
        }

        $conexion->query('INSERT..');

    } catch (Exception $e) {
        error_log($e->getMessage());
        error_log($e->getMessage(),1,'serodfa@hotmail.com');
        echo $e->getMessage();
    } finally {
        echo "<hr>";
        echo "Finalizado";
    }
?>

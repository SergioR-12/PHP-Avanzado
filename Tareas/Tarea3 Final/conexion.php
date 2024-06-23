<?php

     class Conexion {

        public function __construct() {
            $this->conectarBD();
        }

        private function conectarBD() {
            try {
                $conexion = new mysqli('localhost', 'root', '', 'tienda');
                if ($conexion->connect_error != null) {
                    throw new Exception("Ocurrio un error al conectar a la base de datos:  {$conexion->connect_error}");
                }
            } catch (Exception $e) {
                error_log($e->getMessage());
                echo "Ocurrio un error al conectar a la base de datos";
            }
            return $conexion;
        }


        function crearTablaProductos() {
            try {
                $conexion = $this->conectarBD();
                if ($conexion->connect_error != null) {
                    throw new Exception("Ocurrio un error al conectar a la base de datos:  {$conexion->connect_error}");
                } else {
                    $conexion->query( "CREATE TABLE IF NOT EXISTS productos (
                        codigo INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        nombre VARCHAR(100) NOT NULL,
                        detalle TEXT NOT NULL,
                        imagen VARCHAR(255) NOT NULL,
                        precio DOUBLE NOT NULL
                    )");
                }
            } catch (Exception $e) {
                error_log($e->getMessage());
                echo "Ocurrio un error al crear la tabla";
            } finally {
                $conexion->close();
            }
        }


        function insertarProductos($nombre, $detalle, $imagen, $precio) {
            try {
                $conexion = $this->conectarBD();
                if ($conexion->connect_error != null) {
                    throw new Exception("Ocurrio un error al conectar a la base de datos:  {$conexion->connect_error}");
                } else {
                    $conexion->query("INSERT INTO productos (nombre, detalle, imagen, precio)  VALUES ('$nombre', '$detalle', '$imagen', $precio)");
                }
            } catch (Exception $e) {
                error_log($e->getMessage());
                echo "Ocurrio un error al insertar los datos";
            } finally {
                $conexion->close();
            }
        }


        function mostrarProductos() {
            try {
                $conexion = $this->conectarBD();
                if ($conexion->connect_error != null) {
                    throw new Exception("Ocurrio un error al conectar a la base de datos:  {$conexion->connect_error}");
                } else {
                    $consulta = $conexion->query("SELECT nombre, detalle, imagen, precio FROM productos");
                    return $consulta;
                }   
            } catch (Exception $e) {
                error_log($e->getMessage());
                echo "Ocurrio un error al mostrar los datos";
            } 
        }

        function crearTablaConsultas() {
            try {
                $conexion = $this->conectarBD();
                if ($conexion->connect_error != null) {
                    throw new Exception("Ocurrio un error al conectar a la base de datos:  {$conexion->connect_error}");
                } else {
                    $conexion->query( "CREATE TABLE IF NOT EXISTS consultas (
                        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                        nombre VARCHAR(30) NOT NULL,
                        correo VARCHAR(50) NOT NULL,
                        telefono VARCHAR(20) NOT NULL,
                        consulta TEXT NOT NULL
                    )");
                }
            } catch (Exception $e) {
                error_log($e->getMessage());
                echo "Ocurrio un error al crear la tabla";
            } finally {
                $conexion->close();
            }
        }

        function insertarConsulta($nombre, $correo, $telefono, $consulta) {
            try {
                $conexion = $this->conectarBD();
                if ($conexion->connect_error != null) {
                    throw new Exception("Ocurrio un error al conectar a la base de datos:  {$conexion->connect_error}");
                } else {
                    $conexion->query("INSERT INTO consultas (nombre, correo, telefono, consulta) 
                    VALUES ('{$nombre}', '{$correo}', '{$telefono}', '{$consulta}')");
                }
            } catch (Exception $e) {
                error_log($e->getMessage());
                echo "Ocurrio un error al insertar los datos";
            } finally {
                $conexion->close();
            }
        }
    }
?>
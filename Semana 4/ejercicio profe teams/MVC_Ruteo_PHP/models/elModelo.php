<?php
    // active record
    class claseModelo{
        private $nombre;
        private $apellido;
        private $nombreCompleto;

        public function __construct() {
            $this->nombre = "";
            $this->apellido = "";
            $this->nombreCompleto = "";
        }

        function FijaNombre($pNombre) {
            $this->nombre = $pNombre;
        }

        function FijaApellido($pApellido) {
            $this->apellido = $pApellido;
        }

        function FijaNombreCompleto() {
            $this->nombreCompleto = $this->nombre . " " . $this->apellido;
            return $this->nombreCompleto;
        }
    }

?>
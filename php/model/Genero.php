<?php
    class Genero {
        // Propiedades
        private $idGenero;
        private $genero;
        private $imagen;

        function __construct($idGenero, $genero, $imagen) {
            $this->idGenero = $idGenero;
            $this->genero = $genero;
            $this->imagen = $imagen;
        }

        // Métodos:
        public function getIdGenero() {
            return $this->idGenero;
        }

        public function setIdGenero($idGenero) {
            $this->idGenero = $idGenero;
        }

        public function getGenero() {
            return $this->genero;
        }

        public function setGenero($genero) {
            $this->genero = $genero;
        }

        public function getImagen() {
            return $this->imagen;
        }

        public function setImagen($imagen) {
            $this->imagen = $imagen;
        }
    }
?>
<?php
    class Instrumento {
        // Propiedades
        private $idInstumento;
        private $nombreInstrumento;
        private $tipoInstrumento;
        private $marca;
        private $modelo;

        function __construct($idInstumento, $nombreInstrumento, $tipoInstrumento, $marca, $modelo) {
            $this->idInstumento = $idInstumento;
            $this->nombreInstrumento = $nombreInstrumento;
            $this->tipoInstrumento = $tipoInstrumento;
            $this->marca = $marca;
            $this->modelo = $modelo;
        }

        // Métodos:
        public function getIdInstumento() {
            return $this->idInstumento;
        }

        public function setiIdInstumento($idInstumento) {
            $this->idInstumento = $idInstumento;
        }

        public function getNombreInstrumento() {
            return $this->nombreInstrumento;
        }

        public function setNombreInstrumento($nombreInstrumento) {
            $this->nombreInstrumento = $nombreInstrumento;
        }

        public function getTipoInstrumento() {
            return $this->tipoInstrumento;
        }

        public function setTipoInstrumento($tipoInstrumento) {
            $this->tipoInstrumento = $tipoInstrumento;
        }

        public function getMarca() {
            return $this->marca;
        }

        public function setMarca($marca) {
            $this->marca = $marca;
        }

        public function getModelo() {
            return $this->modelo;
        }

        public function setModelo($modelo) {
            $this->modelo = $modelo;
        }
    }
?>
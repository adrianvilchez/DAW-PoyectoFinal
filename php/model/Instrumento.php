<?php
    class Instrumento {
        // Propiedades
        private $idInstumento;
        private $nombreInstrumento;
        private $tipoInstrumento;

        function __construct($idInstrumento, $nombreInstrumento, $tipoInstrumento) {
            $this->idInstrumento = $idInstrumento;
            $this->nombreInstrumento = $nombreInstrumento;
            $this->tipoInstrumento = $tipoInstrumento;
        }

        // Métodos:
        public function getIdInstrumento() {
            return $this->idInstrumento;
        }

        public function setiIdInstumento($idInstrumento) {
            $this->idInstrumento = $idInstrumento;
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
    }
?>
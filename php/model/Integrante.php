<?php
    class Integrante {
        // Propiedades
        private $idIntegrante;
        private $idUsuarioInstrumento;
        private $idGrupo;
        private $habilidad;
        private $experiencia;
        private $lider;

        function __construct($idIntegrante, $idUsuarioInstrumento, $idGrupo, $habilidad, $experiencia, $lider) {
            $this->idIntegrante = $idIntegrante;
            $this->idUsuarioInstrumento = $idUsuarioInstrumento;
            $this->idGrupo = $idGrupo;
            $this->habilidad = $habilidad;
            $this->experiencia = $experiencia;
            $this->lider = $lider;
        }

        // Métodos:
        public function getIdIntegrante() {
            return $this->idIntegrante;
        }

        public function setIdIntegrante($idIntegrante) {
            $this->idIntegrante = $idIntegrante;
        }

        public function getIdUsuarioInstrumento() {
            return $this->idUsuarioInstrumento;
        }

        public function setIdUsuarioInstrumento($idUsuarioInstrumento) {
            $this->idUsuarioInstrumento = $idUsuarioInstrumento;
        }

        public function getIdGrupo() {
            return $this->idGrupo;
        }

        public function setIdGrupo($idGrupo) {
            $this->idGrupo = $idGrupo;
        }

        public function getHabilidad() {
            return $this->habilidad;
        }

        public function setHabilidad($habilidad) {
            $this->habilidad = $habilidad;
        }

        public function getExperiencia() {
            return $this->experiencia;
        }

        public function setExperiencia($experiencia) {
            $this->experiencia = $experiencia;
        }

        public function getLider() {
            return $this->lider;
        }

        public function setLider($lider) {
            $this->lider = $lider;
        }
    }
?>
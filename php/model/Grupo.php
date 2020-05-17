<?php
    class Grupo {
        // Propiedades
        private $idGrupo;
        private $nombreGrupo;
        private $numeroIntegrantes;
        private $cp;
        private $estaCompleto;

        public function __construct($idGrupo, $nombreGrupo, $numeroIntegrantes, $cp, $estaCompleto) {

            $this->$idGrupo = $idGrupo;
            $this->$nombreGrupo = $nombreGrupo;
            $this->$numeroIntegrantes = $numeroIntegrantes;
            $this->$cp = $cp;
            $this->$estaCompleto = $estaCompleto;
        }

        // Métodos:
        public function getIdGrupo() {
            return $this->idGrupo;
        }

        public function setIdGrupo($idGrupo) {
            $this->idGrupo = $idGrupo;
        }

        public function getNombreGrupo() {
            return $this->nombreGrupo;
        }

        public function setNombreGrupo($nombreGrupo) {
            $this->nombreGrupo = $nombreGrupo;
        }

        public function getNumeroIntegrantes() {
            return $this->numeroIntegrantes;
        }

        public function setNumeroIntegrantes($numeroIntegrantes) {
            $this->numeroIntegrantes = $numeroIntegrantes;
        }

        public function getCp() {
            return $this->cp;
        }

        public function setCp($cp) {
            $this->cp = $cp;
        }

        public function getEstaCompleto() {
            return $this->estaCompleto;
        }

        public function setEstaCompleto($estaCompleto) {
            $this->estaCompleto = $estaCompleto;
        }
    }
?>
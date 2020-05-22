<?php
    class Grupo {
        // Propiedades
        private $idGrupo;
        private $nombreGrupo;
        private $generoGrupo;
        private $descripcion;
        private $numeroIntegrantes;
        private $cp;
        private $avatarGrupo;
        private $estaCompleto;
       
        function __construct($idGrupo, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $avatarGrupo, $estaCompleto) {
            $this->idGrupo = $idGrupo;
            $this->nombreGrupo = $nombreGrupo;
            $this->generoGrupo = $generoGrupo;
            $this->descripcion = $descripcion;
            $this->numeroIntegrantes = $numeroIntegrantes;
            $this->cp = $cp;
            $this->avatarGrupo = $avatarGrupo;
            $this->estaCompleto = $estaCompleto;
        }

        // Métodos:
        public function getIdGrupo() {
            return $this->idGrupo;
        }

        public function setIdGrupo($idGrupo) {
            $this->idGrupo = $idGrupo;
        }

        public function getNombreGrupo() {
            error_log("Llamando a 'getNombreGrupo': " . $this->nombreGrupo);
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

        public function getGeneroGrupo() {
            return $this->generoGrupo;
        }

        public function setGeneroGrupo($generoGrupo) {
            $this->generoGrupo = $generoGrupo;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function getCp() {
            return $this->cp;
        }

        public function setCp($cp) {
            $this->cp = $cp;
        }

        public function getAvatarGrupo() {
            return $this->avatarGrupo;
        }

        public function setAvatarGrupo($avatarGrupo) {
            $this->avatarGrupo = $avatarGrupo;
        }

        public function getEstaCompleto() {
            return $this->estaCompleto;
        }

        public function setEstaCompleto($estaCompleto) {
            $this->estaCompleto = $estaCompleto;
        }
    }
?>
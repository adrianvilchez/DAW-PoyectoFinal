<?php
    class Grupo {
        // Propiedades
        private $idGrupo;
        private $nombreGrupo;
        private $generoGrupo;
        private $descripcion;
        private $numeroIntegrantes;
        private $cp;
        private $estaCompleto;

        /*public function __construct($idGrupo, $nombreGrupo, $numeroIntegrantes, $cp, $estaCompleto) {
descripcion
            $this->$idGrupo = $idGrupo;
            $this->$nombreGrupo = $nombreGrupo;
            $this->$numeroIntegrantes = $numeroIntegrantes;
            $this->$cp = $cp;
            $this->$estaCompleto = $estaCompleto;
        }*/

        function __construct() {
            $a = func_get_args();

            $i = func_num_args();


            if (method_exists($this, $f = '__construct' . $i)) {

                call_user_func_array(array($this, $f), $a);
            }
        }
       
        function __construct1($nombreGrupo) {
            $this->$nombreGrupo = $nombreGrupo;
        }
       
        function __construct2($idGrupo, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $estaCompleto) {
            $this->$idGrupo = $idGrupo;
            $this->$nombreGrupo = $nombreGrupo;
            $this->$generoGrupo = $generoGrupo;
            $this->$descripcion = $descripcion;
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

        public function getEstaCompleto() {
            return $this->estaCompleto;
        }

        public function setEstaCompleto($estaCompleto) {
            $this->estaCompleto = $estaCompleto;
        }
    }
?>
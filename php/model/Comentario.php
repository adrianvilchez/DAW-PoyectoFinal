<?php
    class Comentario {
        // Propiedades
        private $idComentario;
        private $titulo;
        private $descripcion;
        private $idUsuario;
        private $fecha;

        function __construct() {
            $a = func_get_args();

            $i = func_num_args();

            if (method_exists($this, $f = '__construct' . $i)) {

                call_user_func_array(array($this, $f), $a);
            }
        }

        function __construct1($idComentario, $titulo, $descripcion, $idUsuario, $fecha) {

            $this->$idComentario = $idComentario;
            $this->$titulo = $titulo;
            $this->$descripcion = $descripcion;
            $this->$idUsuario = $idUsuario;
            $this->$fecha = $fecha;
        }

        // Métodos:
        public function getIdComentario() {
            return $this->idComentario;
        }

        public function setIdComentario($idComentario) {
            $this->idComentario = $idComentario;
        }

        public function getTitulo() {
            return $this->titulo;
        }

        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }

        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setDescripcion($descripcion) {
            $this->descripcion = $descripcion;
        }

        public function getIdUsuario() {
            return $this->idUsuario;
        }

        public function setIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

        public function getFecha() {
            return $this->fecha;
        }

        public function setFecha($fecha) {
            $this->fecha = $fecha;
        }
    }
?>
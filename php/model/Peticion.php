<?php
    class Peticion {
        
        // Propiedades
        private $idPeticion;
        private $idUsuarioRecepcion;
        private $idUsuarioPeticion;
        private $idGrupo;
        private $estado;

        function __construct($idPeticion, $idUsuarioRecepcion, $idUsuarioPeticion, $idGrupo, $estado) {
            $this->idPeticion = $idPeticion;
            $this->idUsuarioRecepcion = $idUsuarioRecepcion;
            $this->idUsuarioPeticion = $idUsuarioPeticion;
            $this->idGrupo = $idGrupo;
            $this->estado = $estado;
        }
        
        public function getIdPeticion()
        {
            return $this->idPeticion;
        }

        public function setIdPeticion($idPeticion)
        {
            $this->idPeticion = $idPeticion;

            return $this;
        }

        public function getIdUsuarioRecepcion()
        {
            return $this->idUsuarioRecepcion;
        }

        public function setIdUsuarioRecepcion($idUsuarioRecepcion)
        {
            $this->idUsuarioRecepcion = $idUsuarioRecepcion;

            return $this;
        }

        public function getIdUsuarioPeticion()
        {
            return $this->idUsuarioPeticion;
        }

        public function setIdUsuarioPeticion($idUsuarioPeticion)
        {
            $this->idUsuarioPeticion = $idUsuarioPeticion;

            return $this;
        }

        public function getIdGrupo()
        {
            return $this->idGrupo;
        }

        public function setIdGrupo($idGrupo)
        {
            $this->idGrupo = $idGrupo;

            return $this;
        }

        public function getEstado()
        {
            return $this->estado;
        }

        public function setEstado($estado)
        {
            $this->estado = $estado;

            return $this;
        }
    }
?>
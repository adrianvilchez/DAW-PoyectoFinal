<?php
    class Usuario {
        // Propiedades
        private $idUsuario;
        private $nombre;
        private $contrasenya;
        private $cp;
        private $email;
        private $telefono;
        private $avatar;
        private $admin;

        // Métodos:
        public function getIdUsuario() {
            return $this->idUsuario;
        }

        public function setiIdUsuario($idUsuario) {
            $this->idUsuario = $idUsuario;
        }

        public function getNombre() {
            return $this->nombre;
        }

        public function setNombre($nombre) {
            $this->nombre = $nombre;
        }

        public function getContrasenya() {
            return $this->contrasenya;
        }

        public function setContrasenya($contrasenya) {
            $this->contrasenya = $contrasenya;
        }

        public function getCp() {
            return $this->cp;
        }

        public function setCp($cp) {
            $this->cp = $cp;
        }

        public function getEmail() {
            return $this->email;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function getTelefono() {
            return $this->telefono;
        }

        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }

        public function getAvatar() {
            return $this->avatar;
        }

        public function setAvatar($avatar) {
            $this->avatar = $avatar;
        }

        public function getAdmin() {
            return $this->admin;
        }

        public function setAdmin($admin) {
            $this->admin = $admin;
        }
    }
?>
<?php
    // llamada normal
    include_once('../db/conexionBBDD.php');

    // llamada desde index.php
    //include_once('php/db/conexionBBDD.php');
    include_once('SesionUsuario.php');

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

        // Constructor
        /*public function __construct($idUsuario, $nombre, $contrasenya, $cp, $email, $telefono, $avatar,  $admin) {

            $this->$idUsuario = $idUsuario;
            $this->$nombre = $nombre;
            $this->$contrasenya = $contrasenya;
            $this->$cp = $cp;
            $this->$email = $email;
            $this->$telefono = $telefono;
            $this->$avatar = $avatar;
            $this->$admin = $admin;
        }*/

        function __construct() {
            $a = func_get_args();

            $i = func_num_args();

            if (method_exists($this, $f = '__construct' . $i)) {

                call_user_func_array(array($this, $f), $a);
            }
        }
       
        function __construct1($nombre) {
            $this->$nombre = $nombre;
        }
       
        function __construct2($nombre, $contrasenya) {
            $this->$nombre = $nombre;
            $this->$contrasenya = $contrasenya;
        }

        function __construct3($nombre, $avatar, $contrasenya = 0) {
            $this->$nombre = $nombre;
            $this->$avatar = $avatar;
        }
       
        function __construct4($idUsuario, $nombre, $contrasenya, $cp, $email, $telefono, $avatar,  $admin) {
            $this->$idUsuario = $idUsuario;
            $this->$nombre = $nombre;
            $this->$contrasenya = $contrasenya;
            $this->$cp = $cp;
            $this->$email = $email;
            $this->$telefono = $telefono;
            $this->$avatar = $avatar;
            $this->$admin = $admin;
        } 

        // [LOGIN]: Métodos para comprobar si el usuario existe
        public function comprobarUsuario($usuario, $contrasenya) {

            $link = abrirConexion();

            $stmt = $link->prepare("SELECT * FROM usuarios WHERE nombre = ? AND contrasenya = ?");
            $stmt->bind_param("ss", $usuario, $contrasenya);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                return false;
            } else {
                return true;
            }

            $stmt->close();
        }
    
        public function establecerUsuario($usuario) {

            $link = abrirConexion();

            $stmt = $link->prepare("SELECT * FROM usuarios WHERE nombre = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();

            $this->nombre = $usuario;

            $stmt->close();
        }

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
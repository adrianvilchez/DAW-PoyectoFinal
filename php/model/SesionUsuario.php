<?php

    class SesionUsuario {

        public function __construct() {
            session_start();
        }

        public function establecerUsuarioActual($usuario) {
            $_SESSION['usuario'] = $usuario;
        }

        public function obtejerUsuarioActual() {
            return $_SESSION['usuario'];
        }

        public function cerrarSesion() {
            session_unset();
            session_destroy();
        }
    }

?>
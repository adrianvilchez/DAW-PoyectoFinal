<?php
    class SesionUsuario {

        public function __construct() {
            session_start();
        }

        public function establecerUsuarioActual($usuario) {
            $_SESSION['usuario'] = $usuario;
        }

        public function obtenerUsuarioActual() {
            return $_SESSION['usuario'];
        }
        
        public function cerrarSesion() {
            error_log("cerrando sesion");
            session_unset();
            session_destroy();
        }
    }
?>
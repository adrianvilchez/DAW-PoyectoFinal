<?php
    class UsuariosController {

        public function obtenerIntegrantes($nombreGrupo) {
            include_once (dirname(__FILE__).'./../model/UsuariosM.php');
            $modeloMusicos = new MusicosModel();
            
            $integrantes = $modeloMusicos->obtenerIntegrantes($nombreGrupo);

            return $integrantes;
        }

        public function actualizarPerfil($contrasenya, $descripcion, $cp, $email, $telefono, $usuario) {
            include_once (dirname(__FILE__).'./../model/UsuariosM.php');
            $modeloMusicos = new MusicosModel();
            
            $actualizarPerfil = $modeloMusicos->actualizarPerfil($contrasenya, $descripcion, $cp, $email, $telefono, $usuario);

            return $actualizarPerfil;
        }

        public function obtenerMusicos() {
            include_once (dirname(__FILE__).'./../model/UsuariosM.php');
            $modeloMusicos = new MusicosModel();
            
            $todosLosMusicos = $modeloMusicos->obtenerMusicos();

            return $todosLosMusicos;
        }

        public function obtenerMusico($musico) {
            include_once (dirname(__FILE__).'./../model/UsuariosM.php');
            $modeloMusicos = new MusicosModel();
            
            $musico = $modeloMusicos->obtenerMusico($musico);

            return $musico;
        }

        public function comprobarUsuario($nombre) {
            include_once (dirname(__FILE__).'./../model/UsuariosM.php');
            $modeloMusicos = new MusicosModel();
            
            $comprobarMusico = $modeloMusicos->comprobarUsuario($nombre);

            return $comprobarMusico;
        }

        // [LOGIN]
        public function comprobarUsuarioLogin($nombre) {
            include_once (dirname(__FILE__).'./../model/UsuariosM.php');
            $modeloMusicos = new MusicosModel();
            
            $comprobarMusico = $modeloMusicos->comprobarUsuarioLogin($nombre);

            return $comprobarMusico;
        }

        public function establecerUsuario($nombre) {
            include_once (dirname(__FILE__).'./../model/UsuariosM.php');
            $modeloMusicos = new MusicosModel();
            
            $comprobarMusico = $modeloMusicos->establecerUsuario($nombre);

            return $comprobarMusico;
        }

        public function crearUsuario($idUsuario, $nombre, $contrasenya, $email) {
            include_once (dirname(__FILE__).'./../model/UsuariosM.php');
            $modeloMusicos = new MusicosModel();
            
            $crearUsuario = $modeloMusicos->crearUsuario($idUsuario, $nombre, $contrasenya, null, null, $email, null, "img/default_user.png", null);

            return $crearUsuario;
        }
    }
?>
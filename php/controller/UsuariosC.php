<?php
    class GruposController {
        public function obtenerMusicos() {
            include_once('../model/UsuariosM.php');
            $modeloMusicos = new MusicosModel();
            
            $todosLosMusicos = $modeloMusicos->obtenerMusicos();

             return $todosLosMusicos;
        }

        public function comprobarUsuario($nombre) {
            include_once('../model/UsuariosM.php');
            $modeloMusicos = new MusicosModel();
            
            $comprobarMusico = $modeloMusicos->comprobarUsuario($nombre);

             return $comprobarMusico;
        }
    }
?>
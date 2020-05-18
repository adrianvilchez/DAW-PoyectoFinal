<?php
    class GruposController {
        public function obtenerGrupos() {
            include_once('../model/GruposM.php');
            $modeloGrupos = new GruposModel();
            
            $todosLosGrupos = $modeloGrupos->obtenerGrupos();

             return $todosLosGrupos;
        }

        public function crearGrupo($idGrupo, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $estaCompleto) {
            include_once('../model/GruposM.php');
            $modeloGrupos = new GruposModel();
            
            $crearGrupo = $modeloGrupos->crearGrupo(null, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $estaCompleto);

             return $crearGrupo;
        }

        public function comprobarGrupo($nombreGrupo) {
            include_once('../model/GruposM.php');
            $modeloGrupos = new GruposModel();
            
            $comprobarGrupo = $modeloGrupos->comprobarGrupo($nombreGrupo);

             return $comprobarGrupo;
        }
    }
?>
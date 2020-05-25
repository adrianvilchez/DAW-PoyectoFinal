<?php
    class GruposController {
        public function obtenerGrupos() {
            include(dirname(__FILE__).'./../model/GruposM.php');
            $modeloGrupos = new GruposModel();
            
            $todosLosGrupos = $modeloGrupos->obtenerGrupos();

             return $todosLosGrupos;
        }

        public function crearGrupo($idGrupo, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $avatarGrupo, $estaCompleto) {
            include(dirname(__FILE__).'./../model/GruposM.php');
            $modeloGrupos = new GruposModel();
            
            $crearGrupo = $modeloGrupos->crearGrupo(null, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $avatarGrupo, $estaCompleto);

             return $crearGrupo;
        }

        public function comprobarGrupo($nombreGrupo) {
            include(dirname(__FILE__).'./../model/GruposM.php');
            $modeloGrupos = new GruposModel();
            
            $comprobarGrupo = $modeloGrupos->comprobarGrupo($nombreGrupo);

             return $comprobarGrupo;
        }
    }
?>
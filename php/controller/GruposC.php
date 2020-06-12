<?php
    class GruposController {

        public function obtenerGruposFiltrados($busqueda, $integrantes, $rock, $indie, $dance, $techno, $pop, $heavy) {
            include(dirname(__FILE__).'./../model/GruposM.php');
            $modeloGrupos = new GruposModel();
            
            $grupos = $modeloGrupos->obtenerGruposFiltrados($busqueda, $integrantes, $rock, $indie, $dance, $techno, $pop, $heavy);

            return $grupos;
        }

        public function obtenerMisGrupos($usuario) {
            include(dirname(__FILE__).'./../model/GruposM.php');
            $modeloGrupos = new GruposModel();
            
            $misGrupos = $modeloGrupos->obtenerMisGrupos($usuario);

            return $misGrupos;
        }

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

        public function obtenerGrupoPorNombre($nombreGrupo) {
            include(dirname(__FILE__).'./../model/GruposM.php');
            $modeloGrupos = new GruposModel();
            
            $grupoPorNombre = $modeloGrupos->obtenerGrupoPorNombre($nombreGrupo);

            return $grupoPorNombre;
        }
    }
?>
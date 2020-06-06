<?php
    class IntegrantesController {
        public function insertarUsuario($idIntegrante, $idUsuarioInstrumento, $idGrupo, $habilidad, $experiencia, $lider) {
            include(dirname(__FILE__).'./../model/IntegrantesM.php');
            $modeloIntegrantes = new IntegrantesModel();
            
            $integrante = $modeloIntegrantes->insertarUsuario($idIntegrante, $idUsuarioInstrumento, $idGrupo, $habilidad, $experiencia, $lider);

             return $integrante;
        }

        public function obtenerIntegrantes($nombreGrupo) {
            include(dirname(__FILE__).'./../model/IntegrantesM.php');
            $modeloIntegrantes = new IntegrantesModel();
            
            $integrantes = $modeloIntegrantes->obtenerIntegrantes($nombreGrupo);

             return $integrantes;
        }
    }
?>
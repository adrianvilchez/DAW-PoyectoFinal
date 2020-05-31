<?php
    class IntegrantesController {
        public function insertarUsuario($idIntegrante, $idUsuarioInstrumento, $idGrupo, $habilidad, $experiencia, $lider) {
            include(dirname(__FILE__).'./../model/IntegrantesM.php');
            $modeloIntegrantes = new IntegrantesModel();
            
            $integrante = $modeloIntegrantes->insertarUsuario($idIntegrante, $idUsuarioInstrumento, $idGrupo, $habilidad, $experiencia, $lider);

             return $integrante;
        }
    }
?>
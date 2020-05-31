<?php
    include_once (dirname(__FILE__).'./../db/conexionBBDD.php');
    include_once (dirname(__FILE__).'./../model/Integrante.php');

    class IntegrantesModel {

        function insertarUsuario($idIntegrante, $idUsuarioInstrumento, $idGrupo, $habilidad, $experiencia, $lider) {

            $link = abrirConexion();
    
            $idIntegrante = null;
            $habilidad = null;
            $experiencia = null;
    
            $stmt = $link->prepare("INSERT INTO integrantes (idIntegrante, idUsuarioInstrumento, idGrupo, habilidad, experiencia, lider) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iiiiii", $idIntegrante, $idUsuarioInstrumento, $idGrupo, $habilidad, $experiencia, $lider);
            $stmt->execute();
    
            $result = $stmt->get_result();
    
            cerrarConexion($link);
    
            return $result;
        }
    }

?>
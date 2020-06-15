<?php
    include_once (dirname(__FILE__).'./../db/conexionBBDD.php');
    include_once (dirname(__FILE__).'./../model/Peticion.php');

    class PeticionesModel {

        function generarPeticion($idPeticion, $idUsuarioRecepcion, $idUsuarioPeticion, $idGrupo, $estado) {

            $link = abrirConexion();
    
            $stmt = $link->prepare("INSERT INTO `peticiones` (idPeticion, idUsuarioRecepcion, idUsuarioPeticion, idGrupo, estado) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("iiiii", $idPeticion, $idUsuarioRecepcion, $idUsuarioPeticion, $idGrupo, $estado);
            $stmt->execute();
    
            $result = $stmt->get_result();
    
            cerrarConexion($link);
    
            return $result;
        }
    }

?>
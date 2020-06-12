<?php
    include_once (dirname(__FILE__).'./../db/conexionBBDD.php');
    include_once (dirname(__FILE__).'./../model/Integrante.php');
    include_once (dirname(__FILE__).'./../model/Usuario.php');

    class IntegrantesModel {

        function insertarUsuario($idIntegrante, $idUsuarioInstrumento, $idGrupo, $habilidad, $experiencia, $lider) {

            $link = abrirConexion();
    
            $stmt = $link->prepare("INSERT INTO integrantes (idIntegrante, idUsuarioInstrumento, idGrupo, habilidad, experiencia, lider) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("iiiiii", $idIntegrante, $idUsuarioInstrumento, $idGrupo, $habilidad, $experiencia, $lider);
            $stmt->execute();
    
            $result = $stmt->get_result();
    
            cerrarConexion($link);
    
            return $result;
        }

        public function obtenerIntegrantes($nombreGrupo) {

            $integrantes = array();
    
            $link = abrirConexion();
    
            $result = consultarBD("SELECT integrantes.* FROM `integrantes`
            INNER JOIN usuarios ON usuarios.idUsuario = integrantes.idUsuarioInstrumento
            INNER JOIN grupos ON grupos.idGrupo = integrantes.idGrupo
            WHERE grupos.nombreGrupo = '$nombreGrupo';", $link);
    
            while ($fila = extraerResultados($result)) {
                
                $auxIntegrante = new Integrante($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5]);

                array_push($integrantes, $auxIntegrante);
            }
    
            cerrarConexion($link);

            return $integrantes;
        }

        
    }

?>
<?php
    include_once (dirname(__FILE__).'./../db/conexionBBDD.php');
    include_once (dirname(__FILE__).'./../model/Peticion.php');

    class PeticionesModel {

        function generarPeticion($idusuario) {

            $link = abrirConexion();
    
            $stmt = $link->prepare("INSERT INTO `peticiones` (idPeticion, idUsuarioRecepcion, idUsuarioPeticion, idGrupo, estado) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("iiiii", $idPeticion, $idUsuarioRecepcion, $idUsuarioPeticion, $idGrupo, $estado);
            $stmt->execute();
    
            $result = $stmt->get_result();
    
            cerrarConexion($link);
    
            return $result;
        }

        public function obtenerPeticiones($usuario) {
    
            $peticion = array();

            $link = abrirConexion();
    
            $result = consultarBD("SELECT usuarios.idUsuario, usuarios.nombre, grupos.idGrupo, grupos.nombreGrupo FROM `peticiones`
            INNER JOIN usuarios ON usuarios.idUsuario = peticiones.idUsuarioPeticion
            INNER JOIN grupos ON grupos.idGrupo = peticiones.idGrupo
            WHERE peticiones.idUsuarioRecepcion = $usuario;", $link);
    
            while ($fila = extraerResultados($result)) {
                
                $auxPeticion = new Peticion($fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);

                array_push($peticion, $auxPeticion);

            }
    
            cerrarConexion($link);

            return $peticion;
        }

        public function obtenerRecepciones($usuario) {
    
            $recepcion = array();

            $link = abrirConexion();
    
            $result = consultarBD("SELECT * FROM peticiones WHERE idUsuarioRecepcion  like '$usuario'", $link);
    
            while ($fila = extraerResultados($result)) {
                
                $auxRecepcion = new Peticion($fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);

                array_push($recepcion, $auxRecepcion);

            }
    
            cerrarConexion($link);

            return $recepcion;
        }
    }

?>
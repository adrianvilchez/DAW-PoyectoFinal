<?php
    include_once (dirname(__FILE__).'./../db/conexionBBDD.php');
    include_once (dirname(__FILE__).'./../model/Peticion.php');

    include_once (dirname(__FILE__).'./../model/Usuario.php');
    include_once (dirname(__FILE__).'./../model/Grupo.php');

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

        public function obtenerPeticiones($usuario) {
    
            $peticion = array();

            $link = abrirConexion();
    
            $result = consultarBD("SELECT usuarios.*, grupos.*, peticiones.* FROM `peticiones`
            INNER JOIN usuarios ON usuarios.idUsuario = peticiones.idUsuarioPeticion
            INNER JOIN grupos ON grupos.idGrupo = peticiones.idGrupo
            WHERE peticiones.idUsuarioRecepcion = $usuario;", $link);
    
            while ($fila = extraerResultados($result)) {
                
                
                $auxUsuario = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7], $fila[8]);
                $auxGrupo = new Grupo($fila[9], $fila[10], $fila[11], $fila[12], $fila[13], $fila[14], $fila[15], $fila[16]);
                $auxPeticion = new Peticion($fila[17], $fila[18], $fila[19], $fila[20], $fila[21]);

                $objeto = new stdClass();
                $objeto->idUsuario = $auxUsuario->getIdUsuario();
                $objeto->nombre = $auxUsuario->getNombre();
                $objeto->idGrupo = $auxGrupo->getIdGrupo();
                $objeto->nombreGrupo = $auxGrupo->getNombreGrupo();

    
                /*$aux[] = array('idUsuario' => $auxUsuario->getIdUsuario(),
                                'nombre' => $auxUsuario->getNombre(),
                                'idGrupo' => $auxGrupo->getIdGrupo(),
                                'nombreGrupo' => $auxGrupo->getNombreGrupo());*/

                array_push($peticion, $objeto);

            }
    
            cerrarConexion($link);

            return $peticion;
        }

        /*public function obtenerRecepciones($usuario) {
    
            $recepcion = array();

            $link = abrirConexion();
    
            $result = consultarBD("SELECT * FROM peticiones WHERE idUsuarioRecepcion  like '$usuario'", $link);
    
            while ($fila = extraerResultados($result)) {
                
                $auxRecepcion = new Peticion($fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);

                array_push($recepcion, $auxRecepcion);

            }
    
            cerrarConexion($link);

            return $recepcion;
        }*/

        // Obtenemos las peticiones que le han hecho al usuario
        public function obtenerNumeroPeticiones($usuario) {

            $link = abrirConexion();
    
            $result = consultarBD("SELECT peticiones.idUsuarioRecepcion FROM `peticiones`
            INNER JOIN usuarios ON usuarios.idUsuario = peticiones.idUsuarioRecepcion
            INNER JOIN grupos ON grupos.idGrupo = peticiones.idGrupo
            WHERE peticiones.idUsuarioRecepcion = $usuario;", $link);
    
            $row_cnt = $result->num_rows;
    
            cerrarConexion($link);

            return $row_cnt;
        }
    }

?>
<?php
    include_once(dirname(__FILE__).'./../db/conexionBBDD.php');
    include_once(dirname(__FILE__).'./../model/Grupo.php');

    class GruposModel {

        function obtenerGrupos() {

            $grupos = array();
    
            $link = abrirConexion();
    
            $result = consultarBD('SELECT * FROM `grupos`', $link);
    
            while ($fila = extraerResultados($result)) {

                $auxGrupo = new Grupo($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7]);

                array_push($grupos, $auxGrupo);
            }

            cerrarConexion($link);

            return $grupos;
        }

        public function comprobarGrupo($nombreGrupo) {

            $link = abrirConexion();

            $stmt = $link->prepare("SELECT nombreGrupo FROM grupos WHERE nombreGrupo = ?");
            $stmt->bind_param("s", $nombreGrupo);
            $stmt->execute();

            $result = $stmt->get_result();

            cerrarConexion($link);

            if ($result->num_rows === 0) {
                return false;
            } else {
                return true;
            }
        }

        public function crearGrupo($idGrupo, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $estaCompleto) {

            $link = abrirConexion();

            $stmt = $link->prepare("INSERT INTO grupos (idGrupo, nombreGrupo, generoGrupo, descripcion, numeroIntegrantes, cp, avatarGrupo, staCompleto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssiiii", $idGrupo, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $avatarGrupo, $estaCompleto);
            $stmt->execute();

            $result = $stmt->get_result();

            cerrarConexion($link);

            return $result;
        }
    }
?>
<?php
    include_once(dirname(__FILE__).'./../db/conexionBBDD.php');
    include_once(dirname(__FILE__).'./../model/Grupo.php');

    class GruposModel {

        function obtenerMisGrupos($usuario) {

            $misGrupos = array();
    
            $link = abrirConexion();
    
            $result = consultarBD("SELECT grupos.* FROM `integrantes`
            INNER JOIN usuariosInstrumentos ON usuariosInstrumentos.idUsuarioInstrumento = integrantes.idUsuarioInstrumento
            INNER JOIN usuarios ON usuarios.idUsuario = usuariosInstrumentos.idUsuario
            INNER JOIN grupos ON grupos.idGrupo = integrantes.idGrupo
            WHERE usuarios.nombre = '$usuario' ORDER BY grupos.idGrupo DESC", $link);
    
            while ($fila = extraerResultados($result)) {

                $auxMisGrupo = new Grupo($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7]);

                array_push($misGrupos, $auxMisGrupo);
            }

            cerrarConexion($link);

            return $misGrupos;
        }


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

        public function crearGrupo($idGrupo, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $avatarGrupo, $estaCompleto) {

            $link = abrirConexion();

            $stmt = $link->prepare("INSERT INTO grupos (idGrupo, nombreGrupo, generoGrupo, descripcion, numeroIntegrantes, cp, avatarGrupo, estaCompleto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssiiii", $idGrupo, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $avatarGrupo, $estaCompleto);
            $stmt->execute();

            $result = $stmt->get_result();

            cerrarConexion($link);

            return $result;
        }

        function obtenerGrupoPorNombre($nombreGrupo) {
    
            $link = abrirConexion();

            $result = consultarBD("SELECT * FROM grupos WHERE nombreGrupo = '$nombreGrupo'", $link);
    
            while ($fila = extraerResultados($result)) {
                $grupo = new Grupo($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7]);
            }
    
            cerrarConexion($link);

            return $grupo;
        }

        // consulta para obtener los usuarios de un grupo
        /*SELECT usuarios.* FROM `integrantes`
            INNER JOIN usuariosInstrumentos ON usuariosInstrumentos.idUsuarioInstrumento = integrantes.idUsuarioInstrumento
            INNER JOIN usuarios ON usuarios.idUsuario = usuariosInstrumentos.idUsuario
            INNER JOIN grupos ON grupos.idGrupo = integrantes.idGrupo
            WHERE grupos.idGrupo = 3;*/

        // consulta para obtener los instrumentos de cada usuario
        /*SELECT DISTINCT instrumentos.nombreInstrumento FROM `instrumentos`
        INNER JOIN usuariosInstrumentos ON usuariosInstrumentos.idInstumento = instrumentos.idInstumento
        INNER JOIN usuarios ON usuarios.idUsuario = usuariosInstrumentos.idUsuario
        WHERE usuarios.nombre = "adrian" */
    }
?>
<?php
    include_once('../db/conexionBBDD.php');
    include_once('../model/Usuario.php');

    class MusicosModel {

        function obtenerMusicos() {

            $musicos = array();
    
            // Hacer consulta a modelo y obtener grupos - Devolver array de grupos
    
            $link = abrirConexion();
    
            $result = consultarBD('SELECT * FROM `usuarios`', $link);
    
            while ($fila = extraerResultados($result)) {
                
                $auxUsuario = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7]);
    
                array_push($musicos, $auxUsuario);
            }
    
            return $musicos;
            $stmt->close();
        }

        public function comprobarUsuario($usuario) {

            $link = abrirConexion();

            $stmt = $link->prepare("SELECT nombre FROM usuario WHERE usuario = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                return false;
            } else {
                return true;
            }

            $stmt->close();
        }
    }

?>
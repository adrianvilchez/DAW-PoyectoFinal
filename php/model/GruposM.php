<?php
    include_once('../db/conexionBBDD.php');
    include_once('../model/Grupo.php');

    class GruposModel {

        function obtenerGrupos() {

            $grupos = array();
    
            // Hacer consulta a modelo y obtener grupos - Devolver array de grupos
    
            $link = abrirConexion();
    
            $result = consultarBD('SELECT * FROM `grupos`', $link);
    
            while ($fila = extraerResultados($result)) {
                
                //$auxGrupo = new Grupo($fila[0], $fila[1], $fila[2], $fila[3], $fila[4]);
    
                //array_push($grupos, $auxGrupo);

                $auxGrupo = new Grupo();

                $auxGrupo->IdGrupo = $fila[0];
                $auxGrupo->NombreGrupo = $fila[1];
                $auxGrupo->GeneroGrupo = $fila[2];
                $auxGrupo->Descripcion = $fila[3];
                $auxGrupo->NumeroIntegrantes = $fila[4];
                $auxGrupo->Cp = $fila[5];
                $auxGrupo->EstaCompleto = $fila[6];              

                $grupos[] = array($auxGrupo);

                /*$auxGrupo = new Grupo(array('idGrupo' => $fila[0],
                                            'nombreGrupo' => $fila[1],
                                            'numeroIntegrantes' => $fila[2],
                                            'cp' => $fila[3],
                                            'estaCompleto' => $fila[4]));

                $grupos[] = array($auxGrupo);*/

            }

            return $grupos;
            //return json_encode($grupos);
            $stmt->close();
        }

        public function comprobarGrupo($nombreGrupo) {

            $link = abrirConexion();

            $stmt = $link->prepare("SELECT nombreGrupo FROM grupos WHERE nombreGrupo = ?");
            $stmt->bind_param("s", $nombreGrupo);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows === 0) {
                return false;
            } else {
                return true;
            }

            $stmt->close();
        }

        public function crearGrupo($idGrupo, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $estaCompleto) {

            $link = abrirConexion();

            $stmt = $link->prepare("INSERT INTO grupos (idGrupo, nombreGrupo, generoGrupo, descripcion, numeroIntegrantes, cp, estaCompleto) VALUES (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("isssiii", $idGrupo, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $estaCompleto);
            $stmt->execute();

            $result = $stmt->get_result();

            // Comprobamos si existe el grupo
            
            return $result;

            $stmt->close();
        }
    }

?>
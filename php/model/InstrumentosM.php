<?php

    include_once(dirname(__FILE__).'./../db/conexionBBDD.php');
    include_once(dirname(__FILE__).'./../model/Instrumento.php');

    class InstrumentosModel {
        public function insertarInstrumentos($idUsuarioInstrumento, $idUsuario, $idInstrumento) {

            $link = abrirConexion();

            $stmt = $link->prepare("INSERT IGNORE INTO usuariosinstrumentos (idUsuarioInstrumento, idUsuario, idInstrumento) VALUES (?, ?, ?)");
            $stmt->bind_param("iii", $idUsuarioInstrumento, $idUsuario, $idInstrumento);
            $stmt->execute();

            $result = $stmt->get_result();

            cerrarConexion($link);

            return $result;
        }

        public function obtenerInstrumentosUsuario($usuario) {
            $instrumentos = array();
    
            $link = abrirConexion();
        
            $result = consultarBD("SELECT DISTINCT instrumentos.* FROM `instrumentos`
            INNER JOIN usuariosInstrumentos ON usuariosInstrumentos.idInstrumento = instrumentos.idInstrumento
            INNER JOIN usuarios ON usuarios.idUsuario = usuariosInstrumentos.idUsuario
            WHERE usuarios.nombre = '$usuario'", $link);
        
            while ($fila = extraerResultados($result)) {
        
                $auxInstrumentos = new Instrumento($fila[0], $fila[1], $fila[2]);
        
                array_push($instrumentos, $auxInstrumentos);
            }
        
            cerrarConexion($link);
        
            return $instrumentos;
        }

        public function obtenerInstrumentos() {
            $instrumentos = array();
    
            $link = abrirConexion();
        
            $result = consultarBD("SELECT * FROM `instrumentos`", $link);
        
            while ($fila = extraerResultados($result)) {
        
                $auxInstrumentos = new Instrumento($fila[0], $fila[1], $fila[2]);
        
                array_push($instrumentos, $auxInstrumentos);
            }
        
            cerrarConexion($link);
        
            return $instrumentos;
        }

        public function obtenerInstrumento($nombreInstrumento) {
    
            $link = abrirConexion();
        
            $result = consultarBD("SELECT * FROM `instrumentos` where `nombreInstrumento` = '$nombreInstrumento'", $link);
        
            while ($fila = extraerResultados($result)) {
                $instrumento = new Instrumento($fila[0], $fila[1], $fila[2]);
            }
        
            cerrarConexion($link);
        
            return $instrumento;
        }
    }
?>
<?php
    class InstrumentosController {
        public function obtenerInstrumentosUsuario($usuario) {
            include_once (dirname(__FILE__).'./../model/InstrumentosM.php');
            $modeloInstrumentos = new InstrumentosModel();
            
            $obtenerInstrumentos = $modeloInstrumentos->obtenerInstrumentosUsuario($usuario);

            return $obtenerInstrumentos;
        }

        public function obtenerInstrumentos() {
            include_once (dirname(__FILE__).'./../model/InstrumentosM.php');
            $modeloInstrumentos = new InstrumentosModel();
            
            $obtenerInstrumentos = $modeloInstrumentos->obtenerInstrumentos();

            return $obtenerInstrumentos;
        }

        public function obtenerInstrumento($nombreInstrumento) {
            include_once (dirname(__FILE__).'./../model/InstrumentosM.php');
            $modeloInstrumento = new InstrumentosModel();
            
            $obtenerInstrumento = $modeloInstrumentos->obtenerInstrumento($nombreInstrumento);

            return $obtenerInstrumento;
        }


        public function insertarInstrumentos($idUsuarioInstrumento, $idUsuario, $idInstrumento) {
            include_once (dirname(__FILE__).'./../model/InstrumentosM.php');
            $modeloInstrumentos = new InstrumentosModel();
            
            $insertarInstrumentos = $modeloInstrumentos->insertarInstrumentos($idUsuarioInstrumento, $idUsuario, $idInstrumento);

            return $insertarInstrumentos;
        }
    }
?>
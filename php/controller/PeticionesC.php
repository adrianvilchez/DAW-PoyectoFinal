<?php
    class PeticionesController {
        public function generarPeticion($idPeticion, $idUsuarioRecepcion, $idUsuarioPeticion, $idGrupo, $estado) {
            include(dirname(__FILE__).'./../model/PeticionesM.php');
            $modeloPeticiones = new PeticionesModel();
            
            $peticion = $modeloPeticiones->generarPeticion($idPeticion, $idUsuarioRecepcion, $idUsuarioPeticion, $idGrupo, $estado);

            return $peticion;
        }

        public function obtenerPeticiones($idUsuario) {
            include(dirname(__FILE__).'./../model/PeticionesM.php');
            $modeloPeticiones = new PeticionesModel();
            
            $peticion = $modeloPeticiones->obtenerPeticiones($idUsuario);

            return $peticion;
        }

        public function obtenerRecepciones($idUsuario) {
            include(dirname(__FILE__).'./../model/PeticionesM.php');
            $modeloPeticiones = new PeticionesModel();
            
            $recepcion = $modeloPeticiones->obtenerRecepciones($idUsuario);

            return $recepcion;
        }

        public function obtenerNumeroPeticiones($idUsuario) {
            include(dirname(__FILE__).'./../model/PeticionesM.php');
            $modeloPeticiones = new PeticionesModel();
            
            $recepcion = $modeloPeticiones->obtenerNumeroPeticiones($idUsuario);

            return $recepcion;
        }
    }
?>
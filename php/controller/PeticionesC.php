<?php
    class PeticionesController {
        public function generarPeticion($idPeticion, $idUsuarioRecepcion, $idUsuarioPeticion, $idGrupo, $estado) {
            include(dirname(__FILE__).'./../model/PeticionesM.php');
            $modeloPeticiones = new PeticionesModel();
            
            $peticion = $modeloPeticiones->generarPeticion(null, $idUsuarioRecepcion, $idUsuarioPeticion, $idGrupo, $estado);

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
            
            $peticion = $modeloPeticiones->obtenerRecepciones($idUsuario);

            return $peticion;
        }
    }
?>
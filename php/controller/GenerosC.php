<?php
    class GenerosController {

        public function obtenerGeneros() {
            include(dirname(__FILE__).'./../model/GenerosM.php');

            $modeloGeneros = new GenerosModel();
            
            $generos = $modeloGeneros->obtenerGeneros();

             return $generos;
        }
    }
?>
<?php
    class GenerosController {
        
        public function obtenerGeneros() {
            include(dirname(__FILE__).'./../model/GenerosM.php');
            //include_once('../model/GruposM.php');
            $modeloGeneros = new GenerosModel();
            
            $generos = $modeloGeneros->obtenerGeneros();

             return $generos;
        }
    }
?>
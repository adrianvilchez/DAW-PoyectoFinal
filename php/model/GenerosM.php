<?php
    include_once (dirname(__FILE__).'./../db/conexionBBDD.php');
    include_once (dirname(__FILE__).'./../model/Genero.php');

    class GenerosModel {

        function obtenerGeneros() {

            $generos = array();
    
            $link = abrirConexion();
    
            $result = consultarBD('SELECT * FROM `generos`', $link);
    
            while ($fila = extraerResultados($result)) {
    
                $auxGenero = new Genero($fila[0], $fila[1], $fila[2]);
    
                array_push($generos, $auxGenero);
            }
    
            cerrarConexion($link);
    
            return $generos;
    
        }
    }

?>
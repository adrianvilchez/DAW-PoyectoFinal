<?php

    include_once(dirname(__FILE__).'./../db/conexionBBDD.php');

    function obtenerGeneros() {

        $generos = array();

        $link = abrirConexion();

        $result = consultarBD('SELECT `genero` FROM `generos`', $link);

        while ($fila = extraerResultados($result)) {

            $auxGenero = $fila[0];

            array_push($generos, $auxGenero);
        }

        cerrarConexion($link);

        return $generos;

    }
?>
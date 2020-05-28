<?php
    include_once (dirname(__FILE__).'./../db/conexionBBDD.php');
    include_once (dirname(__FILE__).'./../model/Genero.php');

    $generos = array();

    $link = abrirConexion();

    $result = consultarBD('SELECT * FROM `generos`', $link);

    while ($fila = extraerResultados($result)) {

        $auxGenero = new Genero($fila[0], $fila[1], $fila[2]);

        $generos[] = array('idGenero' => $auxGenero->getIdGenero(),
                                'genero' => $auxGenero->getGenero(),
                                'imagen' => $auxGenero->getImagen());
    }

    cerrarConexion($link);

    $json_string = json_encode($generos);

    echo $json_string;

?>
<?php
    require_once ('conexionBBDD.php');

    $link = abrirConexion();

    $result = consultarBD("SELECT avatar FROM usuarios WHERE usuario='brian'", $link);
    $result_array = extraerResultados($result);
    header("Content-Type: image/gif");
    //echo $result_array[0];

    echo base64_encode(result_array[0]);

?>
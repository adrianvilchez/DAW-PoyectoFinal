<?php
    function abrirConexion() {
        return new mysqli('localhost', 'root', '43pa2pat7XI28', 'yourband');
    }

    function cerrarConexion($link) {
        mysqli_close($link);
    }

    function consultarBD($consulta, $link) {
        return mysqli_query($link, $consulta);
    }

    function extraerResultados($result) {
        return mysqli_fetch_array($result);
    }
?>


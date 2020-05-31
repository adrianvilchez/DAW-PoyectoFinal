<?php
    include (dirname(__FILE__).'./../controller/IntegrantesC.php');

    $controladorIntegrantes = new IntegrantesController();

    $idIntegrante = null;
    $idUsuarioInstrumento = $_POST['idUsuario'];
    $idGrupo = $_POST['idGrupo'];
    $habilidad = null;
    $experiencia = null;
    $lider = $_POST['lider'];

    $integrante = $controladorIntegrantes->insertarUsuario($idIntegrante, $idUsuarioInstrumento, $idGrupo, $habilidad, $experiencia, $lider);


    $json_string = json_encode($integrante);

    echo $json_string;
?>
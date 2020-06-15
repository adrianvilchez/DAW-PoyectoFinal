<?php
    include(dirname(__FILE__).'./../controller/IntegrantesC.php');

    $controladorIntegrantes = new IntegrantesController();

    $nombreGrupo = $_POST['nombreGrupo'];
    $aux = $controladorIntegrantes->obtenerIntegranteLider($nombreGrupo);

    foreach ($aux as $lider) {

        $aux[] = array('idUsuarioRecepcion' =>  $lider->getIdUsuarioInstrumento());

        $json_string = json_encode($aux);

        echo $json_string;
    }
    
?>
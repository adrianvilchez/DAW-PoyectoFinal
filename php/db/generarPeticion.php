<?php
    include(dirname(__FILE__).'./../controller/PeticionesC.php');

    $controladorPeticiones = new PeticionesController();

    $idPeticion = null;
    $idUsuarioRecepcion = $_POST['idUsuarioRecepcion'];
    $idUsuarioPeticion = $_POST['idUsuarioPeticion'];
    $idGrupo = $_POST['nombreGrupo'];
    $estado = 0;

    $peticion = $controladorPeticiones->generarPeticion($idPeticion, $idUsuarioRecepcion, $idUsuarioPeticion, $idGrupo, $estado);

    $json_string = json_encode($peticion);

    echo $json_string;
    
?>
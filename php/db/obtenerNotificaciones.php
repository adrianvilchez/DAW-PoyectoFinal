<?php
    include_once (dirname(__FILE__).'./../controller/PeticionesC.php');
    include_once (dirname(__FILE__).'./../controller/UsuariosC.php');

    $controladorPeticiones = new PeticionesController();
    $controladorUsuarios = new UsuariosController();

    session_start();
    $auxUsuario = $controladorUsuarios->obtenerMusico($_SESSION['usuario']);

    $notificaciones = $controladorPeticiones->obtenerNumeroPeticiones($auxUsuario->getIdUsuario());

    $json_string = json_encode($notificaciones);

    echo $json_string;

?>
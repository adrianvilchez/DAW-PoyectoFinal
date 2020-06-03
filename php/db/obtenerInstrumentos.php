<?php
    include (dirname(__FILE__).'./../controller/InstrumentosC.php');
    include (dirname(__FILE__).'./../controller/UsuariosC.php');

    $controladorInstrumentos = new InstrumentosController();
    $controladorUsuarios = new UsuariosController();

    session_start();
    $usuario = $_SESSION['usuario'];
    $auxUsuario = $controladorUsuarios->obtenerMusico($usuario);

    $aux = array();

    $instrumentos = $controladorInstrumentos->obtenerInstrumentos();

    foreach ($instrumentos as $instrumento) {
        $aux[] = array('idInstrumento' => $instrumento->getIdInstrumento(),
                       'nombreInstrumento' => $instrumento->getNombreInstrumento(),
                       'idUsuario' => $auxUsuario->getIdUsuario());
    }

    $json_string = json_encode($aux);

    echo $json_string;
?>
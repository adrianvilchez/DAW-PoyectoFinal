<?php
    include_once(dirname(__FILE__).'./../controller/GruposC.php');
    include_once(dirname(__FILE__).'./../controller/UsuariosC.php');

    $aux = array();

    $controladorGrupo = new GruposController();
    $controladorUsuario = new UsuariosController();

    $nombreGrupo = $_POST['nombre'];
    $auxGrupos = $controladorGrupo->obtenerGrupoPorNombre($nombreGrupo);

    // Usuario que crea el grupo
    session_start();
    $usuario = $_SESSION['usuario'];
    $auxMusicos = $controladorUsuario->obtenerMusico($usuario);

    $aux[] = array('idGrupo' => $auxGrupos->getIdGrupo(),
                   'idUsuario' => $auxMusicos->getIdUsuario());

    $json_string = json_encode($aux);

    echo $json_string;
?>
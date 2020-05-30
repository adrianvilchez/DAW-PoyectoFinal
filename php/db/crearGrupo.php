<?php
    include_once(dirname(__FILE__).'./../controller/GruposC.php');

    $controladorGrupo = new GruposController();

    $idGrupo = null;
    $avatarGrupo = $_POST['imagen'];
    $nombreGrupo = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $generoGrupo = $_POST['genero'];
    $numeroIntegrantes = $_POST['integrantes'];
    $cp = $_POST['cp'];
    $estaCompleto = $_POST['estado'];

    $controladorGrupo->crearGrupo($idGrupo, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $avatarGrupo, $estaCompleto);
?>
<?php


    include_once(dirname(__FILE__).'./../db/conexionBBDD.php');
    include_once(dirname(__FILE__).'./../model/Grupo.php');

    $link = abrirConexion();

    $idGrupo = null;
    $avatarGrupo = $_POST['imagen'];
    $nombreGrupo = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $generoGrupo = $_POST['genero'];
    $numeroIntegrantes = $_POST['integrantes'];
    $cp = $_POST['cp'];
    $estaCompleto = $_POST['estado'];


    $stmt = $link->prepare("INSERT INTO grupos (idGrupo, nombreGrupo, generoGrupo, descripcion, numeroIntegrantes, cp, avatarGrupo, estaCompleto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isssiiii", $idGrupo, $nombreGrupo, $generoGrupo, $descripcion, $numeroIntegrantes, $cp, $avatarGrupo, $estaCompleto);
    $stmt->execute();

    $result = $stmt->get_result();

    cerrarConexion($link);

    return $result;
?>
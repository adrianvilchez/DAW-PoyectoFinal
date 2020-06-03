<?php
    include (dirname(__FILE__).'./../controller/InstrumentosC.php');

    $controladorInstrumentos = new InstrumentosController();

    $idUsuarioInstrumento = null;
    $idUsuario = $_POST['idUsuario'];
    $idInstrumento = $_POST['idInstrumento'];

    $instrumento = $controladorInstrumentos->insertarInstrumentos($idUsuarioInstrumento, $idUsuario, $idInstrumento);

?>
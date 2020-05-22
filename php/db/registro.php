<?php

    require_once('../model/UsuariosM.php');
 
    $crearUsuario = new MusicosModel();

    $crearUsuario->crearUsuario($_POST['Usuario'], $_POST['Password']);


    
?>
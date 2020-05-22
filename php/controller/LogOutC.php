<?php
    include '../model/SesionUsuario.php';

    session_start();
    //error_log($_SESSION['usuario']);


    session_unset();
    session_destroy();

    echo "{msg: true}";

    //error_log($_SESSION['usuario']);
?>
<?php
    include_once (dirname(__FILE__).'./../model/SesionUsuario.php');

    session_start();
    session_unset();
    session_destroy();

    echo "{msg: true}";
?>
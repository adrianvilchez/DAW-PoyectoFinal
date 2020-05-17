<?php

    include_once '../php/SesionUsuario.php';

    $sesionUsuario = new SesionUsuario();
    $sesionUsuario->cerrarSesion();

    header("location: ../index.php");

?>
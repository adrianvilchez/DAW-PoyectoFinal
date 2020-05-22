<?php

    $pActivo = true;
    $gActivo = false;
    $mActivo = false;

    // echo $_SESSION["usuario"];
    
    include (dirname(__FILE__).'./componentes/Top.php');
    include (dirname(__FILE__).'./componentes/Header.php');

    $usuarioController = new UsuariosController();
    
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 'main';
    }

    switch ($page) {
        case 'Grupos':
            include (dirname(__FILE__).'./GruposV.php');
            break;
        
        default:
        include (dirname(__FILE__).'./Main.php');
            break;
    }

    include 'componentes/Footer.php';
?>
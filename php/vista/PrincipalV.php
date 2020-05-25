<?php
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
        case 'Musicos':
            include (dirname(__FILE__).'./MusicosV.php');
            break;
        
        default:
            include (dirname(__FILE__).'./Main.php');
            break;
    }

    include (dirname(__FILE__).'./componentes/Footer.php');
?>
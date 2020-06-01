<?php
    include (dirname(__FILE__).'./componentes/Top.php');
    include (dirname(__FILE__).'./componentes/Header.php');
    
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
        case 'Profile':
            include (dirname(__FILE__).'./PerfilV.php');
            break;
        case 'Requests':
            include (dirname(__FILE__).'./PeticionesV.php');
            break;
        case 'MyGroups':
            include (dirname(__FILE__).'./MisGruposV.php');
            break;
        
        default:
            include (dirname(__FILE__).'./Main.php');
            break;
    }

    include (dirname(__FILE__).'./componentes/Footer.php');
?>
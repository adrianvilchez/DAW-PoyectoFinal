<?php
    $controladorUsuario = new UsuariosController();

    $usuario = $_SESSION['usuario'];
    
    $obtenerUsuario = $controladorUsuario->obtenerMusico($usuario);
?>

<body>
    <div class="contenedor">
        <header>
            <div class="imagenHeader">
                <a href="index.php?page=News"><img src='./img/icon-header-2.png' alt='Icono de la cabecera' /></a>
            </div>

            <?php
                include(dirname(__FILE__).'./Nav.php');
            ?>

            <div class="login">
                <?php
                    if (!isset($_SESSION['usuario'])) {
                echo '
                <div class="entrar">
                    <form action="" method="post">
                        <input name="Alogin" type="button" value="Entrar">
                    </form>
                </div>
                <div class="registrarse">
                    <input name="Aregistro" type="button" value="Registrarse">
                </div>';
                
                    } else {
                        echo '
                        <div class="notificaciones">
                            <div class="numeroNotificaciones"></div>

                            <img src="./img/notificaciones.png" alt="Notificaciones">
                            <span class="tooltipNotificaciones">Notificaciones</span>
                        </div>

                        <div class="menuDesplegable">
                            <div class="avatarPerfil">
                                <img class="imagenPerfil" src="' . $obtenerUsuario->getAvatar() . '" alt="Avatar">
                                <span class="tooltipPerfil">Perfil</span>
                            </div>
                            <div id="desplegable" class="contenidoDesplegable">
                                <a href="./index.php?page=Profile">Perfil</a>
                                <a href="./index.php?page=Requests">Peticiones</a>
                                <a href="./index.php?page=MyGroups">Mis Grupos</a>
                            </div>
                        </div>

                        <div class="divLogout">
                            <img src="./img/logout.png" alt="Salir">
                            <span class="tooltipSalir">Salir</span>
                        </div>';
                    }
                ?>
            </div>
        </header>

        <main>
        
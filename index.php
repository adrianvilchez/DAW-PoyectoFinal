<?php
    include_once (dirname(__FILE__).'./php/model/Usuario.php');
    include_once (dirname(__FILE__).'./php/model/SesionUsuario.php');
    include_once (dirname(__FILE__).'./php/controller/UsuariosC.php');

    $sesionUsuario = new SesionUsuario();
    $controladorUsuarios = new UsuariosController();
    
    if (isset($_SESSION['usuario'])) {

        $controladorUsuarios->establecerUsuario($sesionUsuario->obtenerUsuarioActual());
        include_once (dirname(__FILE__).'./php/vista/PrincipalV.php');
    } else if(isset($_POST['usuario']) && isset($_POST['password'])) {

        $nombreUsuario = $_POST['usuario'];
        $contrasenyaUsuario = $_POST['password'];

        setcookie("usuario", $nombreUsuario, time() + (86400 * 30), "/");
        setcookie("contraseña", $contrasenyaUsuario, time() + (86400 * 30), "/");

        if ($controladorUsuarios->comprobarUsuarioLogin($nombreUsuario)) {
            //echo "Existe el usuario";
            $sesionUsuario->establecerUsuarioActual($nombreUsuario);
            $controladorUsuarios->establecerUsuario($nombreUsuario);

            include_once (dirname(__FILE__).'./php/vista/PrincipalV.php');
        } else {
            //echo "No existe el usuario";
            $errorLogin = "Nombre de usuario y/o password incorrecto";
            include_once (dirname(__FILE__).'./php/vista/LoginV.php');
        }
    } else if (isset($_POST['registro'])) {
        //echo "registro";
        include_once (dirname(__FILE__).'./php/vista/RegistroV.php');
    } else if (isset($_POST['crearCuenta'])) {
        if (isset($_POST['usuarioR']) && isset($_POST['passwordR']) && isset($_POST['emailR'])) {
            //echo "regi";
            $nombre = $_POST['usuarioR'];
            $contrasenya = $_POST['passwordR'];
            $email = $_POST['emailR'];
    
            if (!$controladorUsuarios->comprobarUsuarioLogin($nombre)) {
        
                $controladorUsuarios->crearUsuario(null, $nombre, $contrasenya, $email);

    
                include_once (dirname(__FILE__).'./php/vista/LoginV.php');
            } else {
                $errorLogOn = "El usuario ya existe";

                include_once (dirname(__FILE__).'./php/vista/RegistroV.php');
            }
        }
    } else {
        // Cargamos el login

        include_once (dirname(__FILE__).'./php/vista/LoginV.php');
        //include_once (dirname(__FILE__).'./php/vista/PrincipalV.php');
    }
    
?>
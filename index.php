<?php
    include_once (dirname(__FILE__).'./php/model/Usuario.php');
    include_once (dirname(__FILE__).'./php/model/SesionUsuario.php');
    include_once (dirname(__FILE__).'./php/controller/UsuariosC.php');
    //include_once 'php/model/Usuario.php';
    //include_once 'php/controller/UsuariosC.php';
    //include_once 'php/model/SesionUsuario.php';

    $sesionUsuario = new SesionUsuario();
    $controladorUsuarios = new UsuariosController();
    
    if (isset($_SESSION['usuario'])) {

        $controladorUsuarios->establecerUsuario($sesionUsuario->obtenerUsuarioActual());
        include_once (dirname(__FILE__).'./php/vista/PrincipalV.php');
    } else if(isset($_POST['usuario']) && isset($_POST['password'])) {

        $nombreUsuario = $_POST['usuario'];
        $contrasenyaUsuario = $_POST['password'];

        if ($controladorUsuarios->comprobarUsuarioLogin($nombreUsuario, $contrasenyaUsuario)) {
            echo "Existe el usuario";
            $sesionUsuario->establecerUsuarioActual($nombreUsuario);
            $controladorUsuarios->establecerUsuario($nombreUsuario);

            include_once (dirname(__FILE__).'./php/vista/PrincipalV.php');
        } else {
            echo "No existe el usuario";
            $errorLogin = "Nombre de usuario y/o password incorrecto";
            include_once (dirname(__FILE__).'./php/vista/LoginV.php');
        }
    } else if (isset($_POST['registro'])) {
        echo "registro";
        include_once (dirname(__FILE__).'./php/vista/RegistroV.php');
    } else if (isset($_POST['crearCuenta'])) {
        echo "regi";

        if (!$controladorUsuarios->comprobarUsuarioLogin($nombreUsuario, $contrasenyaUsuario)) {

            echo "entra";
            $nombre = $_POST['usuario'];
            $contrasenya = $_POST['password'];
            $email = $_POST['email'];
            
            echo $controladorUsuarios->crearUsuario($nombre, $contrasenya, $email);

            // $sesionUsuario->establecerUsuarioActual($nombreUsuario);
            // $controladorUsuarios->establecerUsuario($nombreUsuario);

            include_once (dirname(__FILE__).'./php/vista/PrincipalV.php');
        } else {
            echo "No existe el usuario";
            $errorLogin = "Nombre de usuario y/o password incorrecto";
            include_once (dirname(__FILE__).'./php/vista/LoginV.php');
        }
       
        include_once (dirname(__FILE__).'./php/vista/PrincipalV.php');
    } else {
        // Cargamos el login
        echo "login";

        //echo $_SESSION['usuario'];
        include_once (dirname(__FILE__).'./php/vista/LoginV.php');
    }
    
?>
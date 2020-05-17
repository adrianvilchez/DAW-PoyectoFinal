<?php
    include_once 'php/model/Usuario.php';
    include_once 'php/model/SesionUsuario.php';

    $sesionUsuario = new SesionUsuario();
    $usuario = new Usuario();
    
    // Si hay sesión
    if (isset($_SESSION['usuario'])) {
        echo "hay sesion";
        $usuario->establecerUsuario($sesionUsuario->obtejerUsuarioActual());
        include_once 'php/vista/Principalv.php';
        
    // Si no hay sesión
    } else if (isset($_POST['usuario']) && isset($_POST['password'])) {
        
        // Se logea y carga el /principal
        $nombreUsuario = $_POST['usuario'];
        $contrasenyaUsuario = $_POST['password'];

        // echo $nombreUsuario;
        // echo $contrasenyaUsuario;

        $usuario = new Usuario();
        // Comprobamos el usuario en la db
        if ($usuario->comprobarUsuario($nombreUsuario, $contrasenyaUsuario)) {
            echo "Existe el usuario";
            $sesionUsuario->establecerUsuarioActual($nombreUsuario);
            $usuario->establecerUsuario($nombreUsuario);

            include_once 'php/vista/principal.php';
        } else {
            echo "No existe el usuario";
            $errorLogin = "Nombre de usuario y/o password incorrecto";
            include_once 'vista/login.php';
        }
    } else if (isset($_POST['registro'])) {
        echo "registro";
        include_once 'vista/registro.php';
    } else {
        // Cargamos el login
        echo "login";
        include_once 'php/vista/PrincipalV.php';
    }

?>
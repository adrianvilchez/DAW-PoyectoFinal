<?php
    include (dirname(__FILE__).'./../controller/UsuariosC.php');

    $controladorUsuarios = new UsuariosController();

    $usuario = $_POST['usuario'];
    $contrasenya = $_POST['auxPass'];
    $email = $_POST['auxEmail'];
    $telefono = $_POST['auxTel'];
    $cp = $_POST['auxCp'];

    $perfil = $controladorUsuarios->actualizarPerfil($contrasenya, $cp, $email, $telefono, $usuario);
?>
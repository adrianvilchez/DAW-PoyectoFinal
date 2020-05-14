<?php
    require_once ('conexionBBDD.php');
    require_once('../Usuario.php');
 
    $usuario = new Usuario();
 
    $link = abrirConexion();

    $usuario->setNombre($_POST["Usuario"]);
    $usuario->setContrasenya($_POST["Password"]);
   
    // Consulta
    $result = consultarBD('SELECT nombre, contrasenya FROM `usuarios`
    WHERE nombre LIKE "' . $usuario->getNombre() . '"', $link);

    
    if ($result) echo "Bienvenido, " . $usuario->getNombre() . ".";
    else echo "ERROR: Could not able to execute $." . mysqli_error($link);
 
    // Cerramos la conexión a la db
    cerrarConexion($link);
?>
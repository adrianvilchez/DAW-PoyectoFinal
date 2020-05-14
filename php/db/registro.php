<?php
    require_once ('conexionBBDD.php');
    require_once('../Usuario.php');
 
    $usuario = new Usuario();
 
    $link = abrirConexion();

    $usuario->setNombre($_POST["Usuario"]);
    $usuario->setContrasenya($_POST["Password"]);

    // Consulta
    $result = consultarBD('INSERT INTO usuarios (idUsuario, nombre, contrasenya)
    VALUES (NULL, "' . $usuario->getNombre() .'", ' . $usuario->getContrasenya() .');', $link);

    /*$result = consultarBD('INSERT INTO usuarios (idUsuario, nombre, contrasenya)
    VALUES (NULL, "Bla", "43pa2pat7XI28");', $link);*/
 
    if ($result) echo "Records inserted successfully.";
        else echo "ERROR: Could not able to execute $." . mysqli_error($link);
 
    // Cerramos la conexión a la db
    cerrarConexion($link);
?>
<?php
    require_once ('conexionBBDD.php');

    //$usuario = new stdClass();

    $link = abrirConexion('localhost', 'root', '43pa2pat7XI28', 'searchband');
    
    // Consulta
    $result = consultarBD('SELECT * FROM usuarios', $link);

    $usuarios = array(); // creamos un array

    while ($fila = extraerResultados($result)) {
        
        $id = $fila[0];

        $nombre = $fila[1];
        $contrasenya = $fila[2];
        $cp = $fila[3];
        $email = $fila[4];
        $telefono = $fila[5];
        
        $usuarios[] = array('idUsuario'=> $id, 'nombre'=> $nombre, 'contrasenya'=> $contrasenya, 'cp'=> $cp,
        'email'=> $email, 'telefono'=> $telefono);
    }

    // Cerramos la conexión a la db
    cerrarConexion($link);

    //Creamos el JSON
    $json_string = json_encode($usuarios);
    echo $json_string;
?>
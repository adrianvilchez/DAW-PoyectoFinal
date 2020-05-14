<?php
    header("Access-Control-Allow-Origin: *");
    require_once ('conexionBBDD.php');

    require_once('../Comentario.php');
    require_once('../Usuario.php');
 
    $comentario = new Comentario();
    $usuario = new Usuario();

    $link = abrirConexion();

    // $usuario = $_POST["nombreUsuario"];

    //$usuario = "brian";
    
    // Consulta
    //$result = consultarBD("SELECT * FROM comentarios where nombre = '" . $usuario . "';", $link);
    $result = consultarBD("SELECT usuarios.nombre, usuarios.avatar, comentarios.* FROM `comentarios` INNER JOIN usuarios ON usuarios.idUsuario = comentarios.idUsuario", $link);
    //$result = consultarBD("SELECT * FROM `comentarios` INNER JOIN usuarios ON comentarios.idUsuario = usuarios.idUsuario WHERE usuarios.nombre = '" . $usuario . "';", $link);

    $comentarios = array(); // creamos un array

    while ($fila = extraerResultados($result)) {
        
        /*$idComentario = $fila[0];

        $titulo = $fila[1];
        $descripcion = $fila[2];
        $idUsuario = $fila[3];*/

        //$comentarios[] = array('idComentario'=> $idComentario, 'titulo'=> $titulo, 'descripcion'=> $descripcion, 'idUsuario'=> $idUsuario);
        
        $usuario->setNombre($fila[0]);
        $usuario->setAvatar($fila[1]);

        $comentario->setIdComentario("$fila[2]");
        $comentario->setTitulo("$fila[3]");
        $comentario->setDescripcion("$fila[4]");
        $comentario->setIdUsuario("$fila[5]");
        $comentario->setFecha("$fila[6]");

        $comentarios[] = array('nombre' => $usuario->getNombre(),
                                'avatar' => $usuario->getAvatar(),
                                'idComentario' => $comentario->getIdComentario(),
                                'titulo' => $comentario->getTitulo(),
                                'descripcion' => $comentario->getDescripcion(),
                                'idUsuario' => $comentario->getIdUsuario(),
                                'fecha' => $comentario->getFecha()); 
    }

    // Cerramos la conexión a la db
    cerrarConexion($link);

    //Creamos el JSON
    $json_string = json_encode($comentarios);
    echo $json_string;
?>
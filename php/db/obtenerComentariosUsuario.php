<?php
    header("Access-Control-Allow-Origin: *");
    require_once ('conexionBBDD.php');

    require_once('../model/Comentario.php');
    require_once('../model/Usuario.php');

    $link = abrirConexion();
    
    // Consulta
    //$result = consultarBD("SELECT * FROM comentarios where nombre = '" . $usuario . "';", $link);
    $result = consultarBD("SELECT usuarios.nombre, usuarios.avatar, comentarios.* FROM `comentarios` INNER JOIN usuarios ON usuarios.idUsuario = comentarios.idUsuario", $link);
    //$result = consultarBD("SELECT * FROM `comentarios` INNER JOIN usuarios ON comentarios.idUsuario = usuarios.idUsuario WHERE usuarios.nombre = '" . $usuario . "';", $link);

    //$arrayUsuarios = array();

    $comentarios = array();

    while ($fila = extraerResultados($result)) {

        $usuario = new Usuario();
        $comentario = new Comentario();

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

        
        /*
        //$usuario = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6]);
        //$usuario = new Usuario(array('nombre' => $fila[0], 'avatar' => $fila[1], 'ignorar' => 0));
        //$usuario = new Usuario($fila[0], $fila[1], 0);

        $usuario = new Usuario();

        $usuario->Nombre = $fila[0];
        $usuario->Avatar = $fila[1];
        $usuario->Contrasenya = 0;

        $comentario = new Comentario();

        $comentario->IdComentario = "$fila[2]";
        $comentario->Titulo = "$fila[3]";
        $comentario->Descripcion = "$fila[4]";
        $comentario->IdUsuario = "$fila[5]";
        $comentario->Fecha = "$fila[6]";

        array_push($arrayUsuarios, $usuario);*/
    }

    // Cerramos la conexión a la db
    cerrarConexion($link);

    //Creamos el JSON
    $json_string = json_encode($comentarios);

    //$json_string = json_encode($arrayUsuarios);

    
    echo $json_string;
?>
<?php
    require_once ('conexionBBDD.php');
    require_once('../Usuario.php');
    require_once('../Instrumento.php');
 
    $usuario = new Usuario();
    $instrumento = new Instrumento();
 
    $link = abrirConexion();
   
    // Consulta
    $result = consultarBD('SELECT usuarios.nombre, instrumentos.nombreInstrumento FROM `integrantes`
    INNER JOIN usuariosInstrumentos ON usuariosInstrumentos.idUsuarioInstrumento = integrantes.idUsuarioInstrumento
    INNER JOIN usuarios ON usuarios.idUsuario = usuariosInstrumentos.idUsuario
    INNER JOIN instrumentos ON instrumentos.idInstumento = usuariosInstrumentos.idInstumento', $link);
 
    $datos = array(); // creamos un array
 
    while ($fila = extraerResultados($result)) {
        $usuario->setNombre("$fila[0]");
        $instrumento->setNombreInstrumento("$fila[1]");

        $datos[] = array('nombre'=> $usuario->getNombre(), 'nombreInstrumento'=> $instrumento->getNombreInstrumento());
    }
 
    // Cerramos la conexión a la db
    cerrarConexion($link);
 
    //Creamos el JSON
    $json_string = json_encode($datos);
    echo $json_string;
?>
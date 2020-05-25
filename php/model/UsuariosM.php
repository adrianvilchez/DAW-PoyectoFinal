<?php
    include_once (dirname(__FILE__).'./../db/conexionBBDD.php');
    include_once (dirname(__FILE__).'./../model/Usuario.php');

    class MusicosModel {

        function obtenerMusicos() {

            $musicos = array();
    
            $link = abrirConexion();
    
            $result = consultarBD('SELECT * FROM `usuarios`', $link);
    
            while ($fila = extraerResultados($result)) {
                
                $auxUsuario = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7]);

                array_push($musicos, $auxUsuario);
            }
    
            cerrarConexion($link);

            return $musicos;
        }

        function obtenerMusico($usuario) {
    
            $link = abrirConexion();
    
            $result = consultarBD("SELECT * FROM usuarios WHERE nombre = '$usuario'", $link);
    
            while ($fila = extraerResultados($result)) {
                
                $musico = new Usuario($fila[0], $fila[1], $fila[2], $fila[3], $fila[4], $fila[5], $fila[6], $fila[7]);

            }
    
            cerrarConexion($link);

            return $musico;
        }

        public function comprobarUsuario($usuario) {

            $link = abrirConexion();

            $stmt = $link->prepare("SELECT nombre FROM usuario WHERE usuario = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();

            $result = $stmt->get_result();

            cerrarConexion($link);

            if ($result->num_rows === 0) {
                return false;
            } else {
                return true;
            }
        }

        // [LOGIN]: Métodos para comprobar si el usuario existe
        public function comprobarUsuarioLogin($usuario, $contrasenya) {

            $link = abrirConexion();

            $stmt = $link->prepare("SELECT * FROM usuarios WHERE nombre = ? AND contrasenya = ?");
            $stmt->bind_param("ss", $usuario, $contrasenya);
            $stmt->execute();

            $result = $stmt->get_result();

            cerrarConexion($link);

            if ($result->num_rows === 0) {
                return false;
            } else {
                return true;
            }
        }
    
        public function establecerUsuario($usuario) {

            $link = abrirConexion();

            $stmt = $link->prepare("SELECT * FROM usuarios WHERE nombre = ?");
            $stmt->bind_param("s", $usuario);
            $stmt->execute();

            cerrarConexion($link);

            $establecerUsuario = new Usuario(null, $usuario, null, null, null, null, null, null);
            
            return $establecerUsuario;
        }

        public function crearUsuario($idUsuario, $nombre, $contrasenya, $cp, $email, $telefono, $avatar, $admin) {

            $link = abrirConexion();

            $stmt = $link->prepare("INSERT INTO usuarios (idUsuario, nombre, contrasenya, cp, email, telefono, avatar, admin) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("issisisi", $idUsuario, $nombre, $contrasenya, $cp, $email, $telefono, $avatar, $admin);
            $stmt->execute();

            $result = $stmt->get_result();

            cerrarConexion($link);
            
            return $result;
        }
    }
?>
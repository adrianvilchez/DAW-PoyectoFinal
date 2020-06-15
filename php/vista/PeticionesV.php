<?php

    include (dirname(__FILE__).'./../controller/PeticionesC.php');
    //include (dirname(__FILE__).'./../controller/UsuariosC.php');

    $peticionesController = new PeticionesController();
    $usuarioController = new UsuariosController();

    $usuario = $_SESSION['usuario'];

    $auxUsuario = $usuarioController->obtenerMusico($usuario);

    //$peticiones = $peticionesController->obtenerRecepciones($auxUsuario->getNombre());
    $peticiones = $peticionesController->obtenerPeticiones($auxUsuario->getIdUsuario());
?>

<div id="mainContainer">

    <div class="tituloPerfil">
        <h1>Perfil de usuario</h1>
    </div>

    <?php

    var_dump($peticiones);

        /*foreach ($peticiones as $peticion) {
            echo "bla " . $peticion->getIdUsuarioRecepcion();
        }*/
    ?>

</div>
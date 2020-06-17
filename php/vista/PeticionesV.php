<?php
    include_once (dirname(__FILE__).'./../controller/PeticionesC.php');

    $peticionesController = new PeticionesController();
    $usuarioController = new UsuariosController();

    $usuario = $_SESSION['usuario'];

    $auxUsuario = $usuarioController->obtenerMusico($usuario);
?>

<div id="mainContainer">

    <div class="peticiones">
        <div class="recibidas">
            <div class="cabeceraPeticiones">
                <h1>Peticiones recibidas</h1>
            </div>

            <?php
                $recibidas = $peticionesController->obtenerPeticiones($auxUsuario->getIdUsuario());

                foreach ($recibidas as $peticion) {
                    include (dirname(__FILE__).'./componentes/imprimirPeticiones.php');
                }
            ?>
        </div>
    </div>
</div>
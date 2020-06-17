<?php
    include_once (dirname(__FILE__).'./../controller/PeticionesC.php');

    $a = new PeticionesController();
    $usuarioController = new UsuariosController();

    $usuario = $_SESSION['usuario'];

    $auxUsuario = $usuarioController->obtenerMusico($usuario);

    $peticiones = $a->obtenerPeticiones($auxUsuario->getIdUsuario());
?>

<div id="mainContainer">

    <div class="tituloPerfil">
        <h1>Peticiones</h1>
    </div>

    <div class="peticiones">

        <div class="enviadas">
            <div class="cabeceraPeticiones">
                <h1>Peticiones enviadas</h1>
            </div>
        
        </div>


        <div class="recibidas">
            <div class="cabeceraPeticiones">
                <h1>peticiones recibidas</h1>
            </div>
            <?php
                foreach ($peticiones as $peticion) {
                    include (dirname(__FILE__).'./componentes/imprimirPeticiones.php');
                }
            ?>
        </div>
    </div>





</div>
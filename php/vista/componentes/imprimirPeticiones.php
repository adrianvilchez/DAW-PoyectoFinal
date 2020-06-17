<?php
    echo "<div class='peticion'>
            <div class='usuarioPeticion' data-id-usuario='" . $peticion->idUsuario . "'>
                <p>#" . $peticion->idUsuario . "</p>
            </div>

            <p>El usuario <strong>'" . $peticion->nombre . "'</strong> te ha enviado una petición para unirse al grupo <strong>'" . $peticion->nombreGrupo . "'</strong> </p>
            <div class='botonesPeticion'>
                <input class='botonPeticion aceptarPeticion' type='button' value='Aceptar'>
                <input class='botonPeticion rechazarPeticion' type='button' value='Rechazar'>
            </div>
        </div>";
?>
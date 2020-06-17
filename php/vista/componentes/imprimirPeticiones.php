<?php
    echo "<div class='peticion'>
            <div class='usuarioPeticion'>
                <p>El usuario '" . $peticion->nombre . "' te ha enviado una petición para unirse al grupo '" . $peticion->nombreGrupo . "' </p>
                <div class'botonesPeticion'>
                    <input type='button' value='Aceptar'>
                    <input type='button' value='Rechazar'>
                </div>
            </div>
            
        </div>";
?>
<?php 
    echo "<div class='grupo' data-id-grupo='" . $auxGrupo->getNombreGrupo() . "'>
            <div class='nombreGrupo'>
                <h3>" . $auxGrupo->getNombreGrupo() . "</h3>
            </div>";

            echo "<div class='avatarComentarios'>
                    <div class='avatarGrupo'>";
                        echo "<img class='avatarGrupo' src='". $auxGrupo->getAvatarGrupo() . "' alt=''>
                    </div>";

            if ($auxGrupo->getDescripcion() == null) {
                echo "<div class='descripcionGrupo'>
                        <p>Este grupo no dispone de descripción.</p>
                    </div>";
            } else {
                echo "<div class='descripcionGrupo'>
                        <p>" . $auxGrupo->getDescripcion() . ".</p>
                    </div>";
            } 
                
            echo "</div><div class='datosGrupo'>
                    <div class='generoGrupo'>
                        <p class='selector'>Género </p>
                        <p class='textoGrupo'>" . $auxGrupo->getGeneroGrupo() . "</p>
                    </div>

                    <div class='verGrupo'>
                        <p class='selector'>Ver Grupo</p>
                    </div>

                    <div class='numeroIntegrantes'>
                        <p class='selector'>Integrantes </p>
                        <p>" . $auxGrupo->getNumeroIntegrantes() . "</p>
                    </div>

                    <div class='cpGrupo'>
                        <p class='selector'>Localidad </p>
                        <p>" . $auxGrupo->getCp() . "</p>
                    </div>";
                    
            if ($auxGrupo->getEstaCompleto() == 1) {
                echo "<div class='grupoCompleto'>
                        <p class='selector'>Estado </p>
                        <p>Completo</p>
                    </div>";
            } else {
                echo "<div class='grupoCompleto'>
                        <p class='selector'>Estado </p>
                        <p>Incompleto</p>
                    </div>";
            }
            echo "</div>
            </div>";
?>
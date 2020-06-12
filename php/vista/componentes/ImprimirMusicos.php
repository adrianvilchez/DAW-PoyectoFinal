<?php 
    echo "<div class='grupo' data-id-grupo='" . $auxMusico->getNombre() . "'>
            <div class='nombreGrupo'>
                <h3>" . $auxMusico->getNombre() . "</h3>
            </div>";

            echo "<div class='avatarComentarios'>
                    <div class='avatarGrupo'>";
                        echo "<img class='avatarGrupo' src='". $auxMusico->getavatar() . "' alt=''>
                    </div>";

            if ($auxMusico->getDescripcion() == null) {
                echo "<div class='descripcionGrupo'>
                        <p>Este Músico no dispone de descripción.</p>
                    </div>";
            } else {
                echo "<div class='descripcionGrupo'>
                        <p>" . $auxMusico->getDescripcion() . ".</p>
                    </div>";
            } 
                
            echo "</div><div class='datosGrupo'>
                    <div class='generoGrupo'>
                        <p class='selector'>Email</p>
                        <p class='textoGrupo'>" . $auxMusico->getEmail() . "</p>
                    </div>

                    <div class='verGrupo' data-id-grupo='" . $auxMusico->getNombre() . "'>
                        <p class='selector'>Ver Músico</p>
                    </div>

                    <div class='numeroIntegrantes'>
                        <p class='selector'>Localidad</p>
                        <p>" . $auxMusico->getCp() . "</p>
                    </div>

                    <div class='cpGrupo'>
                        <p class='selector'>Teléfono </p>
                        <p>" . $auxMusico->getTelefono() . "</p>
                    </div>";
                    
            if ($auxMusico->getAdmin() == 1) {
                echo "<div class='grupoCompleto'>
                        <p class='selector'>Admin</p>
                    </div>";
            }
            echo "</div>
            </div>";
?>
<?php

    $usuarioController = new UsuariosController();

    $datosPerfil = $usuarioController->obtenerMusico($_SESSION['usuario']);
?>

<div id="mainContainer">

    <div class="tituloPerfil">
        <h1>Perfil de usuario</h1>
    </div>

    <div class="perfilUsuario">

        <div class="datosPerfil">

            <div class="nombrePerfil">
                <?php echo "<p>Nombre:</p>" ?>
                <input type="text" name="" value="<?php echo $datosPerfil->getNombre()?>" id="" disabled>
            </div>

            <div class="contrasenyaPerfil">
                <?php echo "<p>contraseña:</p>" ?>
                <input class="auxPass" type="password" name="mod" value="<?php echo $datosPerfil->getContrasenya()?>"  id="" disabled>
                <input id="verConstrasenya" class="verConstrasenya" type="button" value="Ver">
            </div>

            <div class="emailPerfil">
                <?php echo "<p>Email:</p>" ?>
                <input type="email" name="mod" value="<?php echo $datosPerfil->getEmail()?>"  id="" disabled>
            </div>

            <div class="telefonoPerfil">
                <?php echo "<p>Teléfono:</p>" ?>
                <input type="text" name="mod" value="<?php echo $datosPerfil->getTelefono()?>"  id="" disabled>
            </div>

            <div class="cpPerfil">
                <?php echo "<p>Cp:</p>" ?>
                <input type="text" name="mod" value="<?php echo $datosPerfil->getCp()?>"  id="" disabled>
            </div>

            <div class="instrumentosPerfil">
                <?php echo "<p>Instrumentos:</p>" ?>
                <select name="instrumentosPerfil" id="instrumentosPerfil">
                    
                </select>
            </div>

            <input id="botonModificarPerfil" type="button" value="Modificar Perfil">
        </div>

        <div class="avatarPerfilUsuario">
            <img  src='<?php echo $datosPerfil->getAvatar()?>' alt=''>
            <input name="mod" class='cargarImagen' type='file'>
        </div>
    </div>


</div>
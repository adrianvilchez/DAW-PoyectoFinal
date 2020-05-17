<header>
    <div class="imagenHeader">
        <a href="#"><img src='../../img/icon-header-2.png' alt='Icono de la cabecera' /></a>
    </div>

    <?php
        include 'componentes/Nav.php';
    ?>

    <div class="login">
        <?php
            if (!isset($_SESSION['usuario'])) {
        echo '
        <div class="entrar">
            <a href="../vista/LoginV.php">Entrar</a>
        </div>
        <div class="registrarse">
            <a href="./index.php`">Registrarse</a>
        </div>';
        
            } else {
                echo '
                <a href="./vista/logout.php">
                        <img src="./img/logout.png" alt="Salir">
                </a>
                
                <div class="menuDesplegable">
                    <button name="botonDesplegable" class="botonDesplegable">Menu</button>
                    <div id="desplegable" class="contenidoDesplegable">
                        <a href="#">Link 1</a>
                        <a href="#">Link 2</a>
                        <a href="#">Link 3</a>
                    </div>
                </div>';
                ;}
        ?>
    </div>
</header>
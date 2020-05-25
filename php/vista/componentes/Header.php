<body>
    <div class="contenedor">
        <header>
            <div class="imagenHeader">
                <a href="index.php?page=News"><img src='./img/icon-header-2.png' alt='Icono de la cabecera' /></a>
            </div>

            <?php
                include(dirname(__FILE__).'./Nav.php');
            ?>

            <div class="login">
                <?php
                    if (!isset($_SESSION['usuario'])) {
                echo '
                <div class="entrar">
                    <form action="" method="post">
                        <input name="Alogin" type="button" value="Entrar">
                    </form>
                </div>
                <div class="registrarse">
                    <input name="Aregistro" type="button" value="Registrarse">
                </div>';
                
                    } else {
                        echo '
                        <div class="divLogout">
                            <img src="./img/logout.png" alt="Salir">
                        </div>
                        
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

        <main>
        
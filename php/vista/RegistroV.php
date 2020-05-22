<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>YourBand - Entrar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
    <link rel="stylesheet" href="./css/login.css">

    <!-- <script src="./js/registro.js"></script> -->
</head>

<body>
    <div id="contenedorPrincipal">
        
        <div id="contenedorIzquierdo">
            <div class="polaroid">
                <a href="../index.php"><img src="./img/music_band.png" alt="computer icon"></a>
                <p>¡Sé una estrella!</p>
            </div> 
        </div>

        
        <div id="contenedorDerecho">
            <form action="" method="post">
                <h1>¡Regístrate en YourBand!</h1>

                <div class="contenedorInput">
                    <i class="fas fa-user"></i>
                    <input placeholder="Usuario" type="text" name="usuario" class='input_field'>
                </div>

                <div class="contenedorInput">
                    <i class="fas fa-envelope"></i>
                    <input  placeholder="Email" type="email" name="email" id="field_email" class='input_field'>
                </div>

                <div class="contenedorInput">
                    <i class="fas fa-lock"></i>
                    <input  placeholder="Contraseña" type="password" name="password" id="field_password" class='input_field'>
                </div>

            
            
                <input type="submit" value="Crear cuenta" name="crearCuenta" id='inputEnviar' class='input_field'>
            
            </form>
        </div>
    </div>
</body>

</html>
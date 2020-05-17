function comprobarFormulario() {

    let usuario = document.querySelector("input[name='usuario']");
    let password = document.querySelector("input[name='password']");
    let repassword = document.querySelector("input[name='repassword']");
    
    let contenedor = document.getElementById("contenedorDerecho");

    let data = new FormData();

    data.append('Usuario', usuario.value);
    data.append('Password', password.value);

    fetch('http://localhost/DAW-PoyectoFinal/php/db/registro.php', {
        method: 'POST',
        body: data
    }).then(function (respuesta) {

        if (respuesta.ok)  return respuesta.text();

    }).then(function (texto) {

        console.log(texto);
        

        if (texto.includes("Duplicate entry")) {
            contenedor.innerHTML += "El usuario '" + usuario.value + "' ya existe.";
        } else {
            // Si la creación es exitosa, redirigimos al login
            location.href="http://localhost/DAW-PoyectoFinal/vista/login.php";
        }

        // Comprobamos que la contraseña sea entre 8 y 16 caracteres
    // al menos un dígito
    // al menos una minúscula
    // al menos una mayúscula.
    // Puede tener símbolos.
    /*var regex = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

    if (usuario.value != "" || password.value != "" || repassword.value != "") {


        if (password.value != repassword.value) {
            contenedor.innerHTML += "Las contraseñas no coinciden.";
        } else {
            if (!regex.test(password)) {
                contenedor.innerHTML += "La contraseñas no cumplen con los requesitos de seguridad.";
            }

            location.href="http://localhost/DAW-PoyectoFinal/html/login.html";
        }

    } else {

        if(usuario.value == "") {
            contenedor.innerHTML += "Debes de introducir un usuario.";
        }

        if(password.value == "") {
            contenedor.innerHTML += "Debes de introducir una contraseña.";
        }

        if(repassword.value == "") {
            contenedor.innerHTML += "Debes verificar la contraseña.";
        }

        contenedor.innerHTML += "Debes rellenar todos los campos.";
    }*/
    });
}

function init() {


    document.querySelector("input[name='registro']").addEventListener("click", comprobarFormulario);
}

window.onload = init;
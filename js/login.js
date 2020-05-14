function comprobarFormulario() {

    let usuario = document.querySelector("input[name='usuario']");
    let password = document.querySelector("input[name='password']");
    
    let contenedor = document.getElementById("contenedorDerecho");

    let data = new FormData();

    data.append('Usuario', usuario.value);
    data.append('Password', password.value);

    fetch('http://localhost/DAW-PoyectoFinal/php/db/login.php', {
        method: 'POST',
        body: data
    }).then(function (respuesta) {

        if (respuesta.ok)  return respuesta.text();

    }).then(function (texto) {

        console.log(texto);
        
        location.href="http://localhost/DAW-PoyectoFinal/index.html";
    });
}

function init() {
    document.querySelector("input[name='entrar']").addEventListener("click", comprobarFormulario);
}

window.onload = init;
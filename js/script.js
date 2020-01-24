
/*SELECT grupos.nombreGrupo, usuarios.nombre, instrumentos.nombreInstrumento FROM `integrantes` 
INNER JOIN grupos ON integrantes.idGrupo = grupos.idGrupo
INNER JOIN usuariosInstrumentos ON usuariosInstrumentos.idUsuarioInstrumento = integrantes.idUsuarioInstrumento
INNER JOIN usuarios ON usuarios.idUsuario = usuariosInstrumentos.idUsuario
INNER JOIN instrumentos ON instrumentos.idInstumento = usuariosInstrumentos.idInstumento
WHERE grupos.idGrupo = 1;*/

function llamarAjax() {
    console.log("bla");
    
        
    /*let data = new FormData();

    data.append('a', 5);
    data.append('b', 15);*/

    let main = document.querySelector("main");

    let parrafo = document.createElement("P");
    parrafo.classList.add("parrafo");

    main.appendChild(parrafo); 

    /*fetch('http://localhost/DAW-PoyectoFinal/php/obtenerUsuarios.php', {
        method: 'get'//,
        //body: data
    })
    .then(function (respuesta) {
        if (respuesta.ok) {
            console.log(respuesta);
            
            return respuesta.text();  
        }
    }).then(function (texto) {
        console.log(texto);

        document.querySelector(".parrafo").innerHTML = texto;
    });*/

    let peticion = new XMLHttpRequest();

    peticion.onreadystatechange = mostrar;

    peticion.open("GET", "http://localhost/DAW-PoyectoFinal/php/obtenerUsuarios.php", true);
    peticion.send();
    
    function mostrar() {
        console.log(peticion.readyState);
        
        console.log(peticion.status);
        
        
        if (peticion.readyState == 4 && peticion.status == 200) {

            let parrafo = document.createElement("P");
            parrafo.classList.add("parrafo");

            document.body.appendChild(parrafo);
            
            // Leer JSON
            let datos = JSON.parse(peticion.responseText);

            console.log(datos);

            for (i in datos) {
                document.querySelector(".parrafo").innerHTML += i + ": " + datos[i].nombre + "<br>";
            }
        }
    }
}

function init() {
    document.querySelector("input[type='button']").addEventListener("click", llamarAjax);
}

window.onload = init;
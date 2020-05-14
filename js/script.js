
/*SELECT grupos.nombreGrupo, usuarios.nombre, instrumentos.nombreInstrumento FROM `integrantes` 
INNER JOIN grupos ON integrantes.idGrupo = grupos.idGrupo
INNER JOIN usuariosInstrumentos ON usuariosInstrumentos.idUsuarioInstrumento = integrantes.idUsuarioInstrumento
INNER JOIN usuarios ON usuarios.idUsuario = usuariosInstrumentos.idUsuario
INNER JOIN instrumentos ON instrumentos.idInstumento = usuariosInstrumentos.idInstumento
WHERE grupos.idGrupo = 1;*/

function llamarAjax() {

    let main = document.querySelector("#mainContainer");

    let parrafo = document.createElement("P");
    parrafo.classList.add("parrafo");

    main.appendChild(parrafo); 

    obtenerComentariosUsuario("brian");
    //obtenerUsuarios();
    //obtenerAvatar();
}

// Obtenemos todos los comentarios de un usuario
function obtenerComentariosUsuario(usuario) {
            
    let data = new FormData();

    //let usuario = document.querySelector(".nombreUsuario");

    data.append('nombreUsuario', usuario);

    fetch('http://localhost/DAW-PoyectoFinal/php/db/obtenerComentariosUsuario.php', {
        method: 'POST',
        body: data
    }).then(function (respuesta) {

        if (respuesta.ok) {
            
            return respuesta.text();  
        }

    }).then(function (texto) {

        let datos = JSON.parse(texto);

        console.log(texto);

        let comentario;

        for (i in datos) {
            
            comentario = "<div class='post'>" +
                        "<div class='titulo'>" +
                            "<h3>" + datos[i].titulo + "</h3>" +
                        "</div>" +
    
                        "<div class='descripcion'>" +
                            "<p>" + datos[i].descripcion + "</p>" +
                        "</div>" +
    
                        "<div class='fechaAutor'>" +

                            "<img class='avatar' src='" + datos[i].avatar.replace(/\\/g, "") + "' alt='Avatar de usuario'>" +

                            "<div class='autor'>" +
                                "<p>" + datos[i].nombre + "</p>" +
                            "</div>" +
    
                            "<div class='fecha'>" +
                                "<p>" + datos[i].fecha + "</p>" +
                            "</div>" +

                            "<input class='invitar' type='button' value='Invitar'>" +
                        "</div>" +
                    "</div>";

            document.querySelector(".posts").innerHTML += comentario;
            //document.querySelector(".parrafo").innerHTML = texto.titulo;
            //document.querySelector(".parrafo").innerHTML += datos[i].titulo + "<br>" + datos[i].descripcion + "<br>";
        }
    });
}

// Obtenemos todos los usuarios registrados
function obtenerUsuarios() {

    fetch('http://localhost/DAW-PoyectoFinal/php/db/obtenerUsuarios.php', {
		method: 'GET'
		}).then(res => {
			res.json().then(function(data) {

                console.log(data);
                
            
                for (i in data) {
                    document.querySelector(".parrafo").innerHTML += data[i].nombre + "<br>" + data[i].nombreInstrumento + "<br>";
                }
		})
	});
}

// Obtenemos un avatar
function obtenerAvatar() {

    let main = document.querySelector("main");

    fetch('http://localhost/DAW-PoyectoFinal/php/db/obtenerAvatar.php', {
		method: 'GET'
    }).then(function (respuesta) {

        if (respuesta.ok) {
            console.log(respuesta);
            
            return respuesta.text();  
        }

    }).then(function (imagen) {
        console.log(imagen);


        var img = document.createElement('img');

        img.src = imagen;

        main.appendChild(img);
    });
}

function init() {
    document.querySelector("input[name='generar']").addEventListener("click", llamarAjax);
    document.querySelector("input[name='generar']").addEventListener("click", llamarAjax);
}

window.onload = init;
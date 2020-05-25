
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

    fetch('http://localhost/DAW-ProyectoFinal/php/db/obtenerComentariosUsuario.php', {
        method: 'POST',
        body: data
    }).then(function (respuesta) {

        if (respuesta.ok) {
            
            return respuesta.text();  
        }

    }).then(function (texto) {

        console.log(texto);

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

    fetch('http://localhost/DAW-ProyectoFinal/php/db/obtenerUsuarios.php', {
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

    fetch('http://localhost/DAW-ProyectoFinal/php/db/obtenerAvatar.php', {
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


/*Cuando se hace click en el botón, muestra el submenu*/
function desplegable() {   
    //Añade una clase al elemento que tenga el id myDropdown
    document.getElementById("desplegable").classList.toggle("show");

    if (!this.matches('.botonDesplegable')) {
        var dropdowns = document.getElementsByClassName("contenidoDesplegable");
        var i;
        for (i = 0;  i < dropdowns.length; i++) {
          var openDropdown = dropdowns[i];
          
          //Busca dentro de drop-content los elementos con la clase show
          if (openDropdown.classList.contains('show')){
            //elimina la clase show de los elementos dentro de drop-content
            openDropdown.classList.remove('show');
          }
        }
    }
  }


  function logOut() {
    console.log("deslogando");

    fetch('http://localhost/DAW-ProyectoFinal/php/controller/LogOutC.php', {
		method: 'GET'
    }).then(function (respuesta) {

        location.href = 'http://localhost/DAW-ProyectoFinal/index.php';

    });
}

function logIn() {
    console.log("deslogando");

    fetch('http://localhost/DAW-ProyectoFinal/php/controller/LogInC.php', {
		method: 'GET'
    }).then(function (respuesta) {

        location.href = 'http://localhost/DAW-ProyectoFinal/index.php';

    });
}

function barSlider() {

    // I've added annotations to make this easier to follow along at home. Good luck learning and check out my other pens if you found this useful
    // First let's set the colors of our sliders
    const settings = {
        fill: '#1abc9c',
        background: '#d7dcdf'
    }
    
    // First find all our sliders
    const slider = document.querySelector('.range-slider');

    slider.addEventListener('input', (event) => {
        // 1. apply our value to the span
        slider.querySelector('span').innerHTML = event.target.value;
        // 2. apply our fill to the input
        applyFill(event.target);
    });

    // Don't wait for the listener, apply it now!
    applyFill(slider);
    
    // This function applies the fill to our sliders by using a linear gradient background
    function applyFill(slider) {
        // Let's turn our value into a percentage to figure out how far it is in between the min and max of our input
        const percentage = 100 * (slider.value-slider.min) / (slider.max-slider.min);
        // now we'll create a linear gradient that separates at the above point
        // Our background color will change here
        const bg = `linear-gradient(90deg, ${settings.fill} ${percentage}%, ${settings.background} ${percentage+0.1}%)`;
        slider.style.background = bg;
    }
}


function init() {
    document.querySelector("input[name='generar']").addEventListener("click", llamarAjax);

    //document.querySelector("button[name='botonDesplegable']").addEventListener("click", desplegable);

    document.querySelector('.divLogout').addEventListener('click', logOut);

    // Comprobamos la url en la que nos encontramos, si es en 'Grupos' o 'Musicos', cargamos la función
    let URLactual = window.location.toString();

    if (URLactual.includes('?page=Grupos')/* || URLactual.includes('?page=Musicos')*/) {
        barSlider();
    }

}

window.onload = init;
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

    if (!this.matches('.avatarPerfil')) {
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

function crearFormularioGrupo() {
    
    contenedor = document.querySelector(".crearGrupo");

    
    let interfazGrupo =
    "<div class='grupo'>" +
        "<div class='nombreGrupoCrearGrupo'>" +
            "<h3 class='nombreGrupoCG'>Nombre</h3>" +
            "<input class='nombreGrupoInput' type='text'>" +
            "<input class='botonCrearGrupo' type='button' value='Crear Grupo'>" +
        "</div>" +

        "<div class='avatarComentarios'>" +
            "<div class='avatarCrearGrupo'>" +
                "<img class='avatarCrearGrupoImagen' id='avatarCrearGrupoImagen' src='' alt=''>" +
                "<input id='cargarImagen' class='cargarImagen' type='file'>" +
            "</div>" +

            "<div class='descripcionGrupo'>" +
                "<textarea class='descripcionCrearGrupo' name='descripcionCrearGrupo' id=''></textarea>" +
            "</div>" +
        "</div>" +

        "<div class='datosGrupo'>" +
            "<div class='generoGrupo'>" +
                "<p class='selector'>Género </p>" +
                
                "<select class='generoGrupoCrearGrupo' name='selectGeneros' id='selectGeneros'>" +
                    "<option class='generosCrearGrupo' value='Generos' selected>Géneros</option>" +
                "</select>" +
            "</div>" +

            "<div class='numeroIntegrantes'>" +
                "<p class='selector'>Integrantes </p>" +
                "<input class='numeroIntegrantesCrearGrupo' type='text' name='localidadCrearGrupo' id=''>" +
            "</div>" +

            "<div class='cpGrupo'>" +
                "<p class='selector'>Localidad </p>" +
                "<input class='cpCrearGrupo' type='text' name='localidadCrearGrupo' id=''>" +
            "</div>" +
            
            "<div class='grupoCompleto'>" +
                "<p class='selector'>Estado </p>" +
                "<select class='grupoCompletoCrearGrupo' name='selectGeneros' id='selectGeneros'>" +
                    "<option class='estadoCrearGrupo' value='completo' selected>Completo</option>" +
                    "<option class='estadoCrearGrupo' value='incompleto' selected>Incompleto</option>" +
                "</select>" +
            "</div>" + 
        "</div>" + 
    "</div>";

    if (contenedor != null) {
        contenedor.innerHTML = interfazGrupo;

        fetch('http://localhost/DAW-ProyectoFinal/php/db/obtenerGeneros.php', {
		method: 'GET'
		}).then(res => {
			res.json().then(function(data) {

                console.log(data);
                
                select = document.querySelector("select[name='selectGeneros']");

                for (i in data) {

                    console.log(data[i].genero);
                    
                    var option = document.createElement("option");
                    option.textContent = data[i].genero;
                    option.value = data[i].genero;
                    option.style.color = "#24292E";
                    select.add(option);
                }
            })
        });
    }

    let inputFile = document.getElementById('cargarImagen');

    inputFile.addEventListener('change', cargarImagen, false);

    document.querySelector(".botonCrearGrupo").addEventListener("click", crearGrupo);
}

function crearGrupo() {
    let imagen = document.querySelector(".cargarImagen").value;
    let descripcion = document.querySelector(".descripcionCrearGrupo").value;
    let genero = document.querySelector(".generoGrupoCrearGrupo").value;
    let integrantes = document.querySelector(".numeroIntegrantesCrearGrupo").value;
    let cp = document.querySelector(".cpCrearGrupo").value;

    let estado;

    if (document.querySelector(".estadoCrearGrupo").value == "completo") estado = 1
    else estado = 0;

    let nombre = document.querySelector(".nombreGrupoInput").value;

    console.log(imagen + " " + descripcion + " " + genero + " " + integrantes + cp + " " + estado + " " + nombre);
    
    let data = new FormData();

    data.append('imagen', "img/" + imagen);
    data.append('nombre', nombre);
    data.append('descripcion', descripcion);
    data.append('genero', genero);
    data.append('integrantes', integrantes);
    data.append('cp', cp);
    data.append('estado', estado);

    // Creamos el grupo
    fetch('http://localhost/DAW-ProyectoFinal/php/db/crearGrupo.php', {
        method: 'POST',
        body: data
    }).then(function (respuesta) {

        if (respuesta.ok) return respuesta.text();

    }).then(function (texto) {

        data.append('nombre', nombre);
        
        // Obtenemos el id tanto del grupo que se va a crear como del usuario que lo está creando
        fetch('http://localhost/DAW-ProyectoFinal/php/db/obteneridGrupoPorNombre.php', {
            method: 'POST',
            body: data
        }).then(res => {
			res.json().then(function(texto) {

                console.log(texto);

                idGrupo = texto[0].idGrupo;
                idUsuario = texto[0].idUsuario;
                
                //location.href = 'http://localhost/DAW-ProyectoFinal/index.php?page=MyGroups';
                // Tenemos que agregar el usuario que crea el grupo al mismo
    
                let datos = new FormData();
    
                datos.append('idUsuario', idUsuario);
                datos.append('idGrupo', idGrupo);
                datos.append('lider', 1);

                // Insertamos al usuario en el grupo que ha creado, como lider
                fetch('http://localhost/DAW-ProyectoFinal/php/db/insertarUsuarioGrupo.php', {
                    method: 'POST',
                    body: datos
                }).then(function (respuesta) {
                    if (respuesta.ok) return respuesta.text();  
    
                }).then(function (texto) {
    
                    console.log(texto);
                    
                    // Recargamos la página para mostrar el grupo junto a todos los que son del usuario
                    location.href = 'http://localhost/DAW-ProyectoFinal/index.php?page=MyGroups';
                })
            })
        })
        
    });
}

function cargarImagen(event) {
    
    var file = event.target.files[0];

    var reader = new FileReader();

    reader.onload = function(event) {
      var img = document.getElementById('avatarCrearGrupoImagen');
      img.src= event.target.result;
    }

    reader.readAsDataURL(file);
  }

  function cargarPerfil() {

    let nombre = document.querySelector("input[name='nombrePerfil']").value;
    let auxPass = document.querySelector(".auxPass").value;
    let auxEmail = document.querySelector(".auxEmail").value;
    let auxTel = document.querySelector(".auxTel").value;
    let auxCp = document.querySelector(".auxCp").value;


    

    let data = new FormData();

    console.log(nombre);
    console.log(auxPass);
    console.log(auxEmail);
    console.log(auxTel);
    console.log(auxCp);
    

    data.append('usuario', nombre);
    data.append('auxPass', auxPass);
    data.append('auxEmail', auxEmail);
    data.append('auxTel', auxTel);
    data.append('auxCp', auxCp);

    fetch('http://localhost/DAW-ProyectoFinal/php/db/actualizarPerfil.php', {
        method: 'POST',
        body: data
    }).then(function (respuesta) {
        if (respuesta.ok) return respuesta.text();  

    }).then(function (texto) {

        console.log(texto);

        //location.href = 'http://localhost/DAW-ProyectoFinal/index.php?page=MyGroups';
    })
  }

  function guardarPerfil() {
    document.querySelector(".cargarImagen").style.display = "none";

    let inputs = document.querySelectorAll("input[name='mod']");

    inputs.forEach(input => {
        input.disabled = true;
    });

    let boton = document.getElementById("botonModificarPerfil");

    boton.classList.remove("modificarPerfil");
    boton.removeEventListener("click", guardarPerfil);
    boton.addEventListener("click", modificarPerfil);
    boton.value = "Modificar Perfil";
      
    console.log("guardamos el perfil");

    cargarPerfil();
      
  }

  function modificarPerfil() {

    document.querySelector(".cargarImagen").style.display = "block";

    let inputs = document.querySelectorAll("input[name='mod']");

    inputs.forEach(input => {
        input.disabled = false;
    });

    let boton = document.getElementById("botonModificarPerfil");

    boton.classList.add("modificarPerfil");
    boton.removeEventListener("click", modificarPerfil);
    document.querySelector(".modificarPerfil").addEventListener("click", guardarPerfil);
    boton.value = "Guardar Perfil";
  }

  function verContrasenya() {
    let boton = document.getElementById("verConstrasenya");
    let input = document.querySelector(".auxPass");

    input.type = 'text';

    boton.classList.remove("verConstrasenya");
    boton.removeEventListener("click", verContrasenya);
    boton.addEventListener("click", ocultarContrasenya);
    boton.value = "Ocultar";  
  }

  function ocultarContrasenya() {
    let boton = document.getElementById("verConstrasenya");
    let input = document.querySelector(".auxPass");

    input.type = 'password';

    boton.classList.add("verConstrasenya");
    boton.removeEventListener("click", ocultarContrasenya);
    document.querySelector(".verConstrasenya").addEventListener("click", verContrasenya);
    boton.value = "Ver";
  }

function init() {
    //document.querySelector("input[name='generar']").addEventListener("click", llamarAjax);

    document.querySelector(".avatarPerfil").addEventListener("click", desplegable);
    
    document.querySelector('.divLogout').addEventListener('click', logOut);

    let divBoton = document.getElementById('rightContainer');

    // Comprobamos si el elemento está en el DOM
    if (typeof(document.querySelector("input[name='crearGrupo']")) != 'undefined'
        && document.querySelector("input[name='crearGrupo']") != null) {

        if (document.body.contains(divBoton)) {
            document.querySelector("input[name='crearGrupo']").addEventListener("click", crearFormularioGrupo);
        }
    }

    // Comprobamos la url en la que nos encontramos, si es en 'Grupos' o 'Musicos', cargamos la función
    let URLactual = window.location.toString();

    if (URLactual.includes('?page=Grupos')/* || URLactual.includes('?page=Musicos')*/) {
        barSlider();
    }

    if (URLactual.includes('?page=Profile')/* || URLactual.includes('?page=Musicos')*/) {
        let main = document.querySelector("main");
        main.style.display = "block";
        main.style.height = "81.7vh";

        document.querySelector(".cargarImagen").style.display = "none";

        let boton = document.querySelector("#botonModificarPerfil");

        boton.addEventListener("click", modificarPerfil);

        let mostrarContrasenya = document.querySelector("#verConstrasenya");

        mostrarContrasenya.addEventListener("click", verContrasenya);
    }
}

window.onload = init;
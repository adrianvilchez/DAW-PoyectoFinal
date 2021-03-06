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
            "<input class='botonCrearGrupo validador' type='button' value='Crear Grupo'>" +
        "</div>" +

        "<div class='avatarComentarios'>" +
            "<div class='avatarCrearGrupo'>" +
                "<img class='avatarCrearGrupoImagen' id='avatarCrearGrupoImagen' src='' alt=''>" +
                "<input id='cargarImagen' class='cargarImagen validador' type='file'>" +
            "</div>" +

            "<div class='descripcionGrupo'>" +
                "<textarea class='descripcionCrearGrupo validador' name='descripcionCrearGrupo' id=''></textarea>" +
            "</div>" +
        "</div>" +

        "<div class='datosGrupo'>" +
            "<div class='generoGrupo'>" +
                "<p class='selector'>Género </p>" +
                
                "<select class='generoGrupoCrearGrupo' name='selectGeneros' id='selectGeneros'>" +
                    "<option class='generosCrearGrupo validador' value='Generos' selected>Géneros</option>" +
                "</select>" +
            "</div>" +

            "<div class='numeroIntegrantes'>" +
                "<p class='selector'>Integrantes </p>" +
                "<input class='numeroIntegrantesCrearGrupo validador' type='text' name='localidadCrearGrupo' id='' required>" +
            "</div>" +

            "<div class='cpGrupo'>" +
                "<p class='selector'>Localidad </p>" +
                "<input class='cpCrearGrupo validador' type='text' name='localidadCrearGrupo' id='' required>" +
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

    // Obtenemos todos los campos a comprobar, el campo que requiera una acción se mostrará en rojo
    let camposAValidad = document.querySelectorAll(".validador");

    camposAValidad.forEach(campo => {
        campo.addEventListener("blur", function () {
            let imagen = document.querySelector(".cargarImagen");
            let descripcion = document.querySelector(".descripcionCrearGrupo");
            let genero = document.querySelector(".generoGrupoCrearGrupo");
            let integrantes = document.querySelector(".numeroIntegrantesCrearGrupo");
            let cp = document.querySelector(".cpCrearGrupo");
            let nombre = document.querySelector(".nombreGrupoInput");
    
            if (genero.value !=! "Géneros") {
                let bla = document.querySelector(".generoGrupoCrearGrupo");
                bla.classList.add("requerido");
            } else {
                bla.classList.remove("requerido");
            }
            
            if (nombre.value == "" || nombre.value == "undefnined") {
                nombre.classList.add("requerido");
            } else {
                nombre.classList.remove("requerido");
            }
    
            if (descripcion.value == "" || descripcion.value == "undefnined") {
                descripcion.classList.add("requerido");
            } else {
                descripcion.classList.remove("requerido");
            }
            
            if (cp.value == "" || cp.value == "undefnined") {
                cp.classList.add("requerido");
            } else {
                cp.classList.remove("requerido");
            }
    
            if (imagen.value == "" || imagen.value == "undefnined") {
                imagen.classList.add("requerido");
            } else {
                imagen.classList.remove("requerido");
            }
            
            if (integrantes.value == "" || integrantes.value == "undefnined") {
                integrantes.classList.add("requerido");
            } else {
                integrantes.classList.remove("requerido");
            }
        });
    });

    document.querySelector(".botonCrearGrupo").addEventListener("click", crearGrupo);
}

function crearGrupo() {
    // obtenemos los valores de los elementos
    let imagen = document.querySelector(".cargarImagen");
    let descripcion = document.querySelector(".descripcionCrearGrupo");
    let genero = document.querySelector(".generoGrupoCrearGrupo");
    let integrantes = document.querySelector(".numeroIntegrantesCrearGrupo");
    let cp = document.querySelector(".cpCrearGrupo");

    let estado;

    if (document.querySelector(".estadoCrearGrupo").value == "completo") estado = 1
    else estado = 0;

    let nombre = document.querySelector(".nombreGrupoInput");

    console.log(imagen.value + " " + descripcion.value + " " + genero.value + " " + integrantes.value + cp.value + " " + estado.value + " " + nombre.value);
    
    let data = new FormData();

    data.append('imagen', "img/" + imagen.value);
    data.append('nombre', nombre.value);
    data.append('descripcion', descripcion.value);
    data.append('genero', genero.value);
    data.append('integrantes', integrantes.value);
    data.append('cp', cp.value);
    data.append('estado', estado.value);

    // Comprobamos que todos los campos tengan contenido
    if (genero.value != "Géneros" && nombre.value != "" && imagen.value != "" && descripcion.value != "" && integrantes.value != "" && cp.value != "") {
        // Creamos el grupo
        fetch('http://localhost/DAW-ProyectoFinal/php/db/crearGrupo.php', {
            method: 'POST',
            body: data
        }).then(function (respuesta) {

            if (respuesta.ok) return respuesta.text();

        }).then(function (texto) {

            data.append('nombre', nombre.value);
            
            // Obtenemos el id tanto del grupo que se va a crear como del usuario que lo está creando
            fetch('http://localhost/DAW-ProyectoFinal/php/db/obteneridGrupoPorNombre.php', {
                method: 'POST',
                body: data
            }).then(res => {
                res.json().then(function(texto) {

                    console.log(texto);

                    idGrupo = texto[0].idGrupo;
                    idUsuario = texto[0].idUsuario;
                
        
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
    let descripcion = document.querySelector("textarea[name='descripcionPerfil']").value;
    let auxPass = document.querySelector(".auxPass").value;
    let auxEmail = document.querySelector(".auxEmail").value;
    let auxTel = document.querySelector(".auxTel").value;
    let auxCp = document.querySelector(".auxCp").value;

    let data = new FormData();

    console.log(nombre);
    console.log(descripcion);
    console.log(auxPass);
    console.log(auxEmail);
    console.log(auxTel);
    console.log(auxCp);

    data.append('usuario', nombre);
    data.append('auxDescripcion', descripcion);
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

    })
  }

  function guardarPerfil() {
    document.querySelector(".cargarImagen").style.display = "none";

    let inputs = document.querySelectorAll("input[name='mod']");

    inputs.forEach(input => {
        input.disabled = true;
    });

    document.querySelector("textarea[name='descripcionPerfil']").disabled = true;

    let boton = document.getElementById("botonModificarPerfil");

    boton.classList.remove("modificarPerfil");
    boton.removeEventListener("click", guardarPerfil);
    boton.addEventListener("click", modificarPerfil);
    boton.value = "Modificar Perfil";
      
    console.log("guardamos el perfil");

    document.querySelector(".selectInstrumentos").remove();

    cargarPerfil();
      
  }

  function modificarPerfil() {

    document.querySelector(".cargarImagen").style.display = "block";

    let inputs = document.querySelectorAll("input[name='mod']");

    inputs.forEach(input => {
        input.disabled = false;
    });

    document.querySelector("textarea[name='descripcionPerfil']").disabled = false;

    opcionesIntrumentos();

    let boton = document.getElementById("botonModificarPerfil");

    boton.classList.add("modificarPerfil");
    boton.removeEventListener("click", modificarPerfil);
    document.querySelector(".modificarPerfil").addEventListener("click", guardarPerfil);
    boton.value = "Guardar Perfil";
  }

  function anyadirInstrumentos() {

    console.log("el ide del usuario es: " + idUsuarioInsertarInstrumento);
    

    let idInstrumento = document.querySelector(".crearInstrumentosPerfil").value;

    let options = document.querySelectorAll("option");

    let dataInstrumento;

    options.forEach(opcion => {

        if (idInstrumento == opcion.value) {
            dataInstrumento = opcion.getAttribute("data-id-instrumento");

            textOptionFake = opcion.getAttribute("data-nombre-instrumento");

        
            let padre = document.querySelector("#instrumentosPerfil");
        
            let optionFake = document.createElement("option");
            optionFake.textContent = textOptionFake;

            console.log(textOptionFake);
            
        
            padre.appendChild(optionFake);
        }
    });

    let data = new FormData();

    //data.append('nombreInstrumento');
    data.append('idUsuario', idUsuarioInsertarInstrumento);
    data.append('idInstrumento', dataInstrumento);

    console.log("el usuario es: " + idUsuarioInsertarInstrumento + " y el instrumento es: " + dataInstrumento);
    
    fetch('http://localhost/DAW-ProyectoFinal/php/db/insertarInstrumento.php', {
        method: 'POST',
        body: data
    }).then(function (respuesta) {
        if (respuesta.ok) return respuesta.text();  

    }).then(function (texto) {

        console.log(texto);
        
    });
    
  }

  var idUsuarioInsertarInstrumento;

  function opcionesIntrumentos() {
    let selectNuevoInstrumento =
    "<select class='crearInstrumentosPerfil' name='selectGeneros' id='selectInstrumentos'>" +
    "</select>" +
    "<input class='botonInstrumentos' value='Añadir instrumento' type='button' name='botonInstrumentos' id=''>";

    var nuevoSelect = document.createElement("div");
    nuevoSelect.className = "selectInstrumentos";

    let padre = document.querySelector(".instrumentosPerfil").parentNode;

    let instrumentosPerfil = document.querySelector("#botonModificarPerfil");

    padre.insertBefore(nuevoSelect, instrumentosPerfil);

    nuevoSelect.innerHTML = selectNuevoInstrumento;

    document.querySelector(".botonInstrumentos").addEventListener("click", anyadirInstrumentos);

    fetch('http://localhost/DAW-ProyectoFinal/php/db/obtenerInstrumentos.php', {
        method: 'GET'
    }).then(res => {
        res.json().then(function(data) {

            let select = document.getElementById("selectInstrumentos");

            console.log(data);
            idUsuarioInsertarInstrumento = data[0].idUsuario;

            data.forEach(instrumento => {
                let option = document.createElement("option");
                option.textContent = instrumento.nombreInstrumento;
                option.dataset.idInstrumento = instrumento.idInstrumento;
                option.dataset.nombreInstrumento = instrumento.nombreInstrumento;
                select.appendChild(option);
            });
        })
    });
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

  function verGrupo() {

        let nombreGrupo = event.target.parentNode.getAttribute("data-id-grupo");
    
        let divVerGrupo = document.createElement("div");

        divVerGrupo.className = "vistaGrupo"

            let data = new FormData();

            console.log(nombreGrupo);
            

            data.append("nombreGrupo", nombreGrupo);

            fetch('http://localhost/DAW-ProyectoFinal/php/db/imprimirGruposExtendidos.php', {
                method: 'POST',
                body: data
            }).then(function (respuesta) {
                if (respuesta.ok) return respuesta.text();  

            }).then(function (texto) {

                //console.log(texto);

                if (!document.body.contains(document.querySelector(".vistaGrupo"))) {
                    document.querySelector("main").appendChild(divVerGrupo);

                    divVerGrupo.innerHTML += texto;

                    let cruceta = document.querySelector(".cruceta");
        
                    let vistaGrupo = document.querySelector(".vistaGrupo");
        
                    cruceta.addEventListener("click", function() {
                        vistaGrupo.remove();
                    }, false);

                    

                    if (document.body.contains(document.querySelector(".enviarPeticionHabVG"))) {
                        let peticion = document.querySelector(".enviarPeticionHabVG");
                        peticion.addEventListener("click" , enviarPeticion);
                    }
                    
                }
                
            });


        //}
  }


  function enviarPeticion() {

    var nombreGrupoPeticion = event.target.parentNode.getAttribute("data-id-grupo");

    var idUsuarioRecepcion;
    var idUsuarioPeticion;
    var idGrupo;

    let datos = new FormData();
    datos.append("nombre", nombreGrupoPeticion);

    fetch('http://localhost/DAW-ProyectoFinal/php/db/obteneridGrupoPorNombre.php', {
        method: 'POST',
        body: datos
    }).then(res => {
        res.json().then(function(texto) {

            idGrupo = texto[0].idGrupo;
            idUsuarioPeticion = texto[0].idUsuario;

            let data = new FormData();

            data.append("nombreGrupo", nombreGrupoPeticion);
        
            fetch('http://localhost/DAW-ProyectoFinal/php/db/obtenerIntegranteLider.php', {
                method: 'POST',
                body: data
            }).then(res => {
                res.json().then(function(texto) {
                    
                    idUsuarioRecepcion = texto[1].idUsuarioRecepcion;

                    let dataPeticion = new FormData();

                    console.log(idUsuarioPeticion);
                    console.log(idUsuarioRecepcion);
                    console.log(idGrupo);

                    dataPeticion.append("idUsuarioRecepcion", idUsuarioRecepcion);
                    dataPeticion.append("idUsuarioPeticion", idUsuarioPeticion);
                    dataPeticion.append('nombreGrupo', idGrupo);
                    
                    fetch('http://localhost/DAW-ProyectoFinal/php/db/generarPeticion.php', {
                        method: 'POST',
                        body: dataPeticion
                    }).then(res => {
                        res.json().then(function(texto) {
                
                            console.log(texto);
                
                        })
                    })
                })
            })
        })
    })




  }


function init() {

    fetch('http://localhost/DAW-ProyectoFinal/php/db/obtenerNotificaciones.php', {
        method: 'POST',
    }).then(res => {
        res.json().then(function(texto) {

            let notificaciones = document.querySelector(".numeroNotificaciones");


            if (texto != 0) {
                notificaciones.classList.add("tieneNotificaciones");
                notificaciones.innerHTML = "<p>" + texto + "</p>";
            } else {
                notificaciones.classList.remove("tieneNotificaciones");
            }

            document.querySelector(".notificaciones").addEventListener("click", function () {
                location.href = 'http://localhost/DAW-ProyectoFinal/index.php?page=Requests';
            })

        })
    })


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

    if (URLactual.includes('?page=Grupos') || URLactual.includes('?page=MyGroups')) {
        barSlider();

        document.querySelectorAll(".verGrupo").forEach(grupo => {
            grupo.addEventListener("click", verGrupo);
        });
        
        let data = new FormData()

        let generos = document.querySelectorAll("input[type='checkbox']");

        let buscar = document.querySelector("input[type='search']");

        let integrantes = document.querySelector(".range-slider__range");

        integrantes.addEventListener("change", function() {
            console.log(this.value);
            data.append("integrantes", this.value);

        });

        buscar.addEventListener("keyup", function() {
            if (this.value != "" || this.value != undefined || this.value != null || this.value != "<empty string>" ) {
                data.append("busqueda", this.value);
                console.log(this.value);
            }
            
            fetch('http://localhost/DAW-ProyectoFinal/php/db/obtenerGruposFiltrados.php', {
                method: 'POST',
                body: data
            }).then(function (respuesta) {
                if (respuesta.ok) return respuesta.text();  
    
            }).then(function (texto) {
    
                let grupos = document.querySelector("#mainContainer");

                grupos.innerHTML = "";
                grupos.innerHTML = texto;
                //console.log(texto);

                document.querySelectorAll(".verGrupo").forEach(grupo => {
                    grupo.addEventListener("click", verGrupo);
                });
                
            });
        });

        generos.forEach(genero => {
            genero.addEventListener("click", function() {


                if (this.checked && this.value == "Rock") {
                    data.append("Rock", this.value);
                } else if (!this.checked && this.value == "Rock") {
                    data.delete("Rock");
                }

                if (this.checked && this.value == "Indie") {
                    data.append("Indie", this.value);
                } else if (!this.checked && this.value == "Indie") {
                    data.delete("Indie");
                }

                if (this.checked && this.value == "Heavy Metal") {
                    data.append("Heavy Metal", this.value);
                } else if (!this.checked && this.value == "Heavy Metal") {
                    data.delete("Heavy Metal");
                }

                if (this.checked && this.value == "Pop") {
                    data.append("Pop", this.value);
                } else if (!this.checked && this.value == "Pop") {
                    data.delete("Pop");
                }

                if (this.checked && this.value == "Dance") {
                    data.append("Dance", this.value);
                } else if (!this.checked && this.value == "Dance") {
                    data.delete("Dance");
                }

                if (this.checked && this.value == "Techno") {
                    data.append("Techno", this.value);

                } else if (!this.checked && this.value == "Techno") {
                    data.delete("Techno");
                }


            })
            
 
        });
        

    }

    if (URLactual.includes('?page=Musicos')) {
        barSlider();


        let data = new FormData()

        let generos = document.querySelectorAll("input[type='checkbox']");

        let buscar = document.querySelector("input[type='search']");

        let integrantes = document.querySelector(".range-slider__range");

        integrantes.addEventListener("change", function() {
            console.log(this.value);
            data.append("integrantes", this.value);
        });

        buscar.addEventListener("keyup", function() {
            if (this.value != "" || this.value != undefined || this.value != null || this.value != "<empty string>" ) {
                data.append("busqueda", this.value);
                console.log(this.value); 
            }
            
            
        });

        generos.forEach(genero => {
            genero.addEventListener("change", function() {


                if (this.checked && this.value == "Rock") {
                    data.append("Rock", this.value);
                } else if (!this.checked && this.value == "Rock") {
                    data.delete("Rock");
                }

                if (this.checked && this.value == "Indie") {
                    data.append("Indie", this.value);
                } else if (!this.checked && this.value == "Indie") {
                    data.delete("Indie");
                }

                if (this.checked && this.value == "Heavy Metal") {
                    data.append("Heavy Metal", this.value);
                } else if (!this.checked && this.value == "Heavy Metal") {
                    data.delete("Heavy Metal");
                }

                if (this.checked && this.value == "Pop") {
                    data.append("Pop", this.value);
                } else if (!this.checked && this.value == "Pop") {
                    data.delete("Pop");
                }

                if (this.checked && this.value == "Dance") {
                    data.append("Dance", this.value);
                } else if (!this.checked && this.value == "Dance") {
                    data.delete("Dance");
                }

                if (this.checked && this.value == "Techno") {
                    data.append("Techno", this.value);
                } else if (!this.checked && this.value == "Techno") {
                    data.delete("Techno");
                }

            })
        });

        fetch('http://localhost/DAW-ProyectoFinal/php/db/obtenerGruposFiltrados.php', {
            method: 'POST',
            body: data
        }).then(function (respuesta) {
            if (respuesta.ok) return respuesta.text();  

        }).then(function (texto) {

            console.log(texto);
            
        });
        
    }

    if (URLactual.includes('?page=Profile')/* || URLactual.includes('?page=Musicos')*/) {
        let main = document.querySelector("main");
        main.style.display = "block";
        main.style.height = "90vh";

        document.querySelector(".cargarImagen").style.display = "none";

        let boton = document.querySelector("#botonModificarPerfil");

        boton.addEventListener("click", modificarPerfil);

        let mostrarContrasenya = document.querySelector("#verConstrasenya");

        mostrarContrasenya.addEventListener("click", verContrasenya);
    }

    if (URLactual.includes('?page=News')/* || URLactual.includes('?page=Musicos')*/) {
        let main = document.querySelector("main");
        main.style.display = "block";
    }

    if (URLactual.includes('?page=Requests')/* || URLactual.includes('?page=Musicos')*/) {
        let main = document.querySelector("main");
        main.style.display = "block";
        main.style.height = "72vh";
    }
}

window.onload = init;
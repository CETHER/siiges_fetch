//Campos del formulario
const usuarioInput = document.querySelector('#usuario');
const contrasenaInput = document.querySelector('#contrasena');

const url = document.querySelector('#url');


//UI
const formulario = document.querySelector('#login');

class UI {
  imprimirMensaje() {
    //Crear el div
    const divMensaje = document.getElementById('mensaje');
    const error = getParameterByName('error');

    if (error == 1) {
      divMensaje.className = "alert alert-danger";
      //Mensaje de error
      divMensaje.innerHTML = "Verifique los datos de inicio de sesi&oacute;n.";
      //Agregar al DOM
    } 
  }
}

const ui = new UI();

//Registro de eventos
eventListeners();
function eventListeners() {
  formulario.addEventListener('submit', login);
  ui.imprimirMensaje();
}

// Hace login
function login(e) {
  e.preventDefault();

  //Iniciando sesión
  const data = new FormData(document.getElementById('login'));
  fetch('controllers/control-usuario.php', {
    method: 'POST',
    body: data
  })
    .then(function(response) {
      console.log(response);
      location.href = response.url;
    })
    .catch(function(err) {
      console.log(err);
    });
}

function getParameterByName(name) {
  name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
  var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
  results = regex.exec(location.search);
  return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}